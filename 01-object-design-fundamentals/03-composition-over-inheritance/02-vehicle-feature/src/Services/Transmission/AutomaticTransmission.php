<?php
declare(strict_types=1);

namespace App\Services\Transmission;

use App\Contracts\TransmissionFeature;

final class AutomaticTransmission
{
	public function type(): string
	{
		return '8-Speed Automatic';
	}
}