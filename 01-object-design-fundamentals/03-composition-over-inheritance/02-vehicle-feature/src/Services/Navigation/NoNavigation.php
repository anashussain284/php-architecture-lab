<?php
declare(strict_types=1);

namespace App\Services\Navigation;

use App\Contracts\NavigationFeature;
use App\Models\Specification;

final class NoNavigation implements NavigationFeature
{
	public function specification(): Specification
	{
		return new Specification(
			label: 'Navigation',
			value: 'No Navigation System',
		);
	}
}