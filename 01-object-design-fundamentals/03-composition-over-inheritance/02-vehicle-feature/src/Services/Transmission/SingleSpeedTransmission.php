<?php
declare(strict_types=1);

namespace App\Services\Transmission;

use App\Contracts\TransmissionFeature;
use App\Models\Specification;

final class SingleSpeedTransmission implements TransmissionFeature
{
	public function specification(): Specification
	{
		return new Specification(
			label: 'Transmission',
			value: 'Single Speed EV Transmission',
		);
	}
}