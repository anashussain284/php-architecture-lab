<?php
declare(strict_types=1);

namespace App\Services\Navigation;

use App\Contracts\NavigationFeature;

final class NoNavigation implements NavigationFeature
{
	public function routeMap(): string
	{
		return 'No Navigation System';
	}
}