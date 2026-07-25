<?php
declare(strict_types=1);

namespace App\Services\Safety;

use App\Contracts\SafetyFeature;
use App\Models\Specification;

final class BasicSafety implements SafetyFeature
{
	public function specification(): Specification
	{
		return new Specification(
			label: 'Safety',
			value: 'ABS + Airbag'
		);
	}
}