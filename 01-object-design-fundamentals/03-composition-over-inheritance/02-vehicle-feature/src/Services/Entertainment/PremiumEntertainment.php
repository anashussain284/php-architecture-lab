<?php
declare(strict_types=1);

namespace App\Services\Entertainment;

use App\Contracts\EntertainmentFeature;

final class PremiumEntertainment implements EntertainmentFeature
{
	public function description(): string
	{
		return 'Premium Entertainment';
	}
}