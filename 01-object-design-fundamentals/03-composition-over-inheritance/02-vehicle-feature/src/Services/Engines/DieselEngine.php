<?php
declare(strict_types=1);

namespace App\Services\Engines;

use App\Contracts\EngineFeature;

final class DieselEngine implements EngineFeature
{
	public function engineSpecification(): string
	{
		return '5.0L Diesel Engine';
	}
}