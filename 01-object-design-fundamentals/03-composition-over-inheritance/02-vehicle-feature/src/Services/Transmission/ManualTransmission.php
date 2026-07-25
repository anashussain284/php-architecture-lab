<?php
declare(strict_types=1);

namespace App\Services\Transmission;

use App\Contracts\TransmissionFeature;

final class ManualTransmission implements TransmissionFeature
{
	public function type(): string
	{
		return '6-Speed Manual';
	}
}