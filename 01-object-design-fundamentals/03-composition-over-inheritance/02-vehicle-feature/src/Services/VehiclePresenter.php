<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Vehicle;

final class VehiclePresenter
{
	public function show(Vehicle $vehicle): void
	{
		echo PHP_EOL . "VEHICLE DETAILS" . PHP_EOL;
		echo "-----------------" . PHP_EOL;
		echo sprintf("%-15s: %s", "Name", $vehicle->name) . PHP_EOL;

		foreach ($vehicle->specifications() as $spec) {
			echo sprintf("%-15s: %s", $spec->label, $spec->value) . PHP_EOL;
		}
		echo PHP_EOL;
	}
}