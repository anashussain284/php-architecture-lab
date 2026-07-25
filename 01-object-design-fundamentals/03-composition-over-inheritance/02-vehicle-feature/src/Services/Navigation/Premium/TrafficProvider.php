<?php
declare(strict_types=1);

namespace App\Services\Navigation\Premium;

final readonly class TrafficProvider
{
	public function fetchLiveTrafficData(): string
	{
		return "Live traffic: Low congestion";
	}
}