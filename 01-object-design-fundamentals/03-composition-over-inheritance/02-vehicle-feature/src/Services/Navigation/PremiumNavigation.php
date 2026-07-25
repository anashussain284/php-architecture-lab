<?php
declare(strict_types=1);

namespace App\Services\Navigation;

use App\Models\Specification;
use App\Contracts\NavigationFeature;
use App\Services\Navigation\Premium\RouteCalculator;
use App\Services\Navigation\Premium\TrafficProvider;
use App\Services\Navigation\Premium\VoiceAssistant;

final readonly class PremiumNavigation implements NavigationFeature
{
	public function __construct(
		private RouteCalculator $routeCalculator,
		private TrafficProvider $trafficProvider,
		private VoiceAssistant $voiceAssistant
	) {}

	public function specification(): Specification
	{
		$route = $this->routeCalculator->calculateBestRoute(origin:'Kochi' , destination: 'Trivandrum');
		$traffic = $this->trafficProvider->fetchLiveTrafficData();
		$alert = $this->voiceAssistant->prompt(message: 'Turn right in 200 meters');

		return new Specification(
			label: 'Navigation',
			value: "AI Navigation [{$route} | {$traffic} | {$alert}]",
		);
	}
}