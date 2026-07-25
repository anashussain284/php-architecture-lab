<?php
declare(strict_types=1);

namespace App\Services\Entertainment;

use App\Contracts\EntertainmentFeature;
use App\Models\Specification;

final class PremiumEntertainment implements EntertainmentFeature
{
	public function specification(): Specification
	{
		return new Specification(
			label: 'Entertainment',
			value: 'Premium Entertainment'
		);
	}
}