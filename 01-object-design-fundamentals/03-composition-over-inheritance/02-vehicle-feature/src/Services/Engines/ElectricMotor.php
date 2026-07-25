<?php
declare(strict_types=1);

namespace App\Services\Engines;

use App\Contracts\EngineFeature;

final class ElectricMotor implements EngineFeature
{
	public function engineSpecification(): string
	{
		return 'Dual Electric Motor';
	}
}