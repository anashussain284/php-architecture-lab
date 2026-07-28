<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Money;
use App\Models\BankAccount;
use App\Services\StatementPrinter;
use App\Models\AccountStatement;

try {
	$account = new BankAccount(
		accountNumber: 'ACC-1001',
		holderName: 'Anas Hussain'
	);

	$account->deposit(new Money(amount: 500, currency: 'USD'));
	$account->withdraw(new Money(amount: 100, currency: 'USD'));
	$account->withdraw(new Money(amount: 100, currency: 'USD'));
	$statementPrinter = new StatementPrinter();
	$statementPrinter->print($account->statement());
} catch (\Exception $e) {
	echo $e->getMessage() . PHP_EOL;
}