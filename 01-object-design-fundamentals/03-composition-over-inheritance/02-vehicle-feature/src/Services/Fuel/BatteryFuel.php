<?php
declare(strict_types=1);

namespace App\Services\Fuel;

use App\Contracts\FuelFeature;

final class BatteryFuel implements FuelFeature
{
	public function fuelType(): string
	{
		return 'Battery';
	}
}