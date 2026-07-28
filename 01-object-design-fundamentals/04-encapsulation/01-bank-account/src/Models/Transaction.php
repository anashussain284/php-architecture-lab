<?php
declare(strict_types=1);

namespace App\Models;

use App\Enums\TransactionType;
use App\Models\Money;

final readonly class Transaction
{
	public function __construct(
		private TransactionType $type,
		private Money $amount,
		private \DateTimeImmutable $createdAt
	) {}

	public function getAmount(): Money
	{
		return $this->amount;
	}

	public function getType(): TransactionType
	{
		return $this->type;
	}

	public function getCreatedAt(): \DateTimeImmutable
	{
	    return $this->createdAt;
	}
}