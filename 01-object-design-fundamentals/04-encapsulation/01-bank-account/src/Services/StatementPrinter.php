<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\AccountStatement;

final class StatementPrinter
{
	public function print(AccountStatement $statement): void
	{
		echo "ACCOUNT DETAILS" . PHP_EOL;
		echo "------------------" . PHP_EOL;
		echo "Number: {$statement->accountNumber}" . PHP_EOL;
		echo "Name: {$statement->holderName}" . PHP_EOL;
		echo "Status: {$statement->status->value}" . PHP_EOL;
		echo "Balance: {$statement->balance->format()}" . PHP_EOL;
		echo "Transactions: " . PHP_EOL;
		foreach ($statement->getTransactions() as $transaction) {
			echo "{$transaction->date} | {$transaction->type} | {$transaction->amount}" . PHP_EOL;
		}
	}
}