<?php
declare(strict_types=1);

namespace App\Services\Navigation;

use App\Contracts\NavigationFeature;

final class PremiumNavigation implements NavigationFeature
{
	public function routeMap(): string
	{
		return 'AI Assisted Navigation';
	}
}