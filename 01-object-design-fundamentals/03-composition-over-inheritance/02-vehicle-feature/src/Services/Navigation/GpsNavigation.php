<?php
declare(strict_types=1);

namespace App\Services\Navigation;

use App\Contracts\NavigationFeature;
use App\Models\Specification;

final class GpsNavigation implements NavigationFeature
{
	public function specification(): Specification
	{
		return new Specification(
			label: 'Navigation',
			value: 'Standard GPS Navigation'
		);
	}
}