<?php
declare(strict_types=1);

namespace App\Services\Transmission;

use App\Contracts\TransmissionFeature;

final class SingleSpeedTransmission implements TransmissionFeature
{
	public function type(): string
	{
		return 'Single Speed EV Transmission';
	}
}