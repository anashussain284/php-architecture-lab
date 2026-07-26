<?php
declare(strict_types=1);

namespace App\Services\Pricing\Features;

final class PriceFormatter
{
	public function format(): string
	{
		return '$';
	}
}