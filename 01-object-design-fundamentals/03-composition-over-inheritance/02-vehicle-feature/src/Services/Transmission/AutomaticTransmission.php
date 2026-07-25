<?php
declare(strict_types=1);

namespace App\Services\Transmission;

use App\Contracts\TransmissionFeature;
use App\Models\Specification;

final class AutomaticTransmission implements TransmissionFeature
{
	public function specification(): Specification
	{
		return new Specification(
			label: 'Transmission',
			value: '8-Speed Automatic',
		);
	}
}