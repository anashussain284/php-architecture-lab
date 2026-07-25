<?php
declare(strict_types=1);

namespace App\Services\Safety;

use App\Contracts\SafetyFeature;

final class AutonomousSafety implements SafetyFeature
{
	public function description(): string
	{
		return 'Full Autonomous Safety Suite';
	}
}