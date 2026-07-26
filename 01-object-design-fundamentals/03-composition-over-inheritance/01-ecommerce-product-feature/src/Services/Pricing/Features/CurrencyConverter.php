<?php
declare(strict_types=1);

namespace App\Services\Pricing\Features;

final class CurrencyConverter
{
	public function convert(): string
	{
		return 'USD';
	}
}