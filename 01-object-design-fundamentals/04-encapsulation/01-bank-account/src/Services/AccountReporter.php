<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\BankAccount;

final class AccountReporter
{
	public function show(BankAccount $account): void
	{
		echo "Current Balance: ";
		echo $account->balance()->format();
		echo PHP_EOL;
	}
}