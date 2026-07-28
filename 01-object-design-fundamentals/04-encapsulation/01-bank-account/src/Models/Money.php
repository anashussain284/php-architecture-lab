<?php
declare(strict_types=1);

namespace App\Models;

use RuntimeException;

final readonly class Money
{
	public function __construct(
		private float $amount,
		private string $currency
	) {}

	public function getAmount(): float
	{
		return $this->amount;
	}

	public function getCurrency(): string
	{
		return $this->currency;
	}

	public function isNegativeOrZero(): bool
	{
		return $this->amount <= 0;
	}

	public function greaterThan(Money $money): bool
	{
		return $this->amount > $money->amount;
	}

	public function subtract(Money $money): Money
	{
		if ($money->getCurrency() !== $this->currency) {
			throw new RuntimeException('Currency mismatch.');
		}

		return new Money(
			amount: $this->amount - $money->amount,
			currency: $this->currency
		);
	}

	public function add(Money $money): Money
	{
		if ($money->getCurrency() !== $this->currency) {
			throw new RuntimeException('Currency mismatch.');
		}

		return new Money(
			amount: $this->amount + $money->amount,
			currency: $this->currency
		);
	}

	public function format(): string
	{
		return sprintf("%s %.2f", $this->currency, $this->amount);
	}
}