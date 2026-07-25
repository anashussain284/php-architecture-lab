<?php
declare(strict_types=1);

namespace App\Services\Fuel;

use App\Contracts\FuelFeature;
use App\Models\Specification;

final class PetrolFuel implements FuelFeature
{
	public function specification(): Specification
	{
		return new Specification(
			label: 'Fuel',
			value: 'Petrol'
		);
	}
}