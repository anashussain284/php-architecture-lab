<?php
declare(strict_types=1);

namespace App\Models;

use App\Enums\Currency;
use App\Enums\AccountStatus;
use App\Enums\TransactionType;
use InvalidArgumentException;
use RuntimeException;

final class BankAccount
{
	private float $dailyWithdrawn = 0;

	private float $dailyLimit = 1000;

	private array $transactions = [];

	private AccountStatus $status;
	private Money $balance;

	private int $failedPinAttempts = 0;

	public function __construct(
		private readonly string $accountNumber,
		private readonly string $holderName
	)
	{
		$this->status = AccountStatus::ACTIVE;
		$this->balance = new Money(0, Currency::USD->value);
	}

	public function deposit(Money $money): void
	{
		$this->ensureAccountIsActive();

		if ($money->isNegativeOrZero()) {
			throw new InvalidArgumentException("Invalid deposit amount.");
		}

		$this->balance = $this->balance->add($money);

		$this->recordTransaction(TransactionType::DEPOSIT, $money);
	}

	public function withdraw(Money $money): void
	{
		$this->ensureAccountIsActive();

		if ($money->isNegativeOrZero()) {
			throw new InvalidArgumentException("Invalid withdraw amount.");
		}

		if ($money->greaterThan($this->balance)) {
			throw new RuntimeException("Insufficient balance.");
		}

		if ($this->dailyWithdrawn + $money->getAmount() > $this->dailyLimit) {
			throw new RuntimeException("Daily withdrawal limit exceeded.");
		}

		$this->balance = $this->balance->subtract($money);
		$this->dailyWithdrawn += $money->getAmount();

		$this->recordTransaction(TransactionType::WITHDRAW, $money);
	}

	public function freeze(): void
	{
		$this->status = AccountStatus::FROZEN;
	}

	public function activate(): void
	{
		$this->status = AccountStatus::ACTIVE;
	}

	public function close(): void
	{
		$this->status = AccountStatus::CLOSED;
	}

	public function balance(): Money
	{
		return $this->balance;
	}

	private function recordTransaction(
		TransactionType $type,
		Money $money
	): void
	{
		$this->transactions[] = new Transaction(
			$type,
			$money,
			new \DateTimeImmutable()
		);
	}

	private function ensureAccountIsActive(): void
	{
		if ($this->status !== AccountStatus::ACTIVE) {
			throw new RuntimeException("Account is not active.");
		}
	}

	public function registerFailedAttempt(): void
	{
		$this->failedPinAttempts++;

		if ($this->failedPinAttempts >= 3) {
			$this->freeze();
		}
	}

	public function registerSuccessfulAttempt(): void
	{
		$this->failedPinAttempts = 0;
	}

	public function statement(): AccountStatement
	{
	    return new AccountStatement(
	        accountNumber: $this->accountNumber,
	        holderName: $this->holderName,
	        status: $this->status,
	        balance: $this->balance,
	        transactions: array_map(
	            fn (Transaction $transaction) => new TransactionSummary(
	                type: $transaction->getType()->value,
	                amount: $transaction->getAmount()->format(),
	                date: $transaction->getCreatedAt()->format('Y-m-d H:i:s')
	            ),
	            $this->transactions
	        )
	    );
	}
}