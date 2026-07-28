<?php
declare(strict_types=1);

namespace App\Models;

use App\Enums\AccountStatus;

final readonly class AccountStatement
{
	public function __construct(
		public string $accountNumber,
		public string $holderName,
		public AccountStatus $status,
		public Money $balance,
		private array $transactions
	) {}

	public function getTransactions(): array
	{
		return $this->transactions;
	}
}