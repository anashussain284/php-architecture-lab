<?php
declare(strict_types=1);

namespace App\Services\Navigation\Premium;

final readonly class RouteCalculator
{
	public function calculateBestRoute(string $origin, string $destination): string
	{
		return "Optimal route: from {$origin} to {$destination}";
	}
}