<?php
declare(strict_types=1);

namespace App\Models;

final readonly class TransactionSummary
{
    public function __construct(
        public string $type,
        public string $amount,
        public string $date
    ) {}
}