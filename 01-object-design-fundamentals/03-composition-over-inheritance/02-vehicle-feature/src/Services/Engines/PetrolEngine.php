<?php
declare(strict_types=1);

namespace App\Services\Engines;

use App\Contracts\EngineFeature;
use App\Models\Specification;

final class PetrolEngine implements EngineFeature
{
	public function specification(): Specification
	{
		return new Specification(
			label: 'Engine',
			value: 'Petrol Engine'
		);
	}
}