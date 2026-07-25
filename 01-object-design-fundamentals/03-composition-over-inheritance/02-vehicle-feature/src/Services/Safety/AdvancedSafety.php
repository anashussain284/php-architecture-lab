<?php
declare(strict_types=1);

namespace App\Services\Safety;

use App\Contracts\SafetyFeature;

class AdvancedSafety implements SafetyFeature
{
	public function description(): string
	{
		return 'ABS + Airbag';
	}
}