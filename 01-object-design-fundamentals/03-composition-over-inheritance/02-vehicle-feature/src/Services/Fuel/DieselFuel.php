<?php
declare(strict_types=1);

namespace App\Services\Fuel;

use App\Contracts\FuelFeature;

final class DieselFuel implements FuelFeature
{
	public function fuelType(): string
	{
		return 'Diesel';
	}
}