<?php
declare(strict_types=1);

namespace App\Models;

use App\Contracts\VehicleFeature;

final class Vehicle
{
	private array $features = [];

	public function __construct(
		public readonly string $name,
		VehicleFeature ...$features
	) {
		foreach ($features as $feature) {
			$this->features[$feature::class] = $feature;
		}
	}

	public function specifications(): array
	{
		return array_map(
			static fn(VehicleFeature $feature): Specification => $feature->specification(),
			array_values($this->features)
		);
	}
}