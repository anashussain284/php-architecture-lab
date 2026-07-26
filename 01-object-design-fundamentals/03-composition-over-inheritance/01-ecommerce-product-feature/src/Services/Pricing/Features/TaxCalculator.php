<?php
declare(strict_types=1);

namespace App\Services\Pricing\Features;

final class TaxCalculator
{
	public function tax(): int
	{
		return 18;
	}
}