<?php
declare(strict_types=1);

namespace App\Models;

use App\Contracts\EngineFeature;
use App\Contracts\FuelFeature;
use App\Contracts\EntertainmentFeature;
use App\Contracts\NavigationFeature;
use App\Contracts\SafetyFeature;

use App\Contracts\TransmissionFeature;

final class Vehicle
{
	public function __construct(
		public readonly string $name,
		private readonly EngineFeature $engine,
		private readonly FuelFeature $fule,
		private readonly EntertainmentFeature $entertainment,
		private readonly NavigationFeature $navigation,
		private readonly SafetyFeature $safety,
		private readonly TransmissionFeature $transmission
	) {}

	public function engine(): string
	{
		return $this->engine->engineSpecification();
	}

	public function fuel(): string
	{
		return $this->fule->fuelType();
	}

	public function entertainment()
	{
		return $this->entertainment->description();
	}

	public function navigation()
	{
		return $this->navigation->routeMap();
	}

	public function safety()
	{
		return $this->safety->description();
	}

	public function transmission()
	{
		return $this->transmission->type();
	}
}