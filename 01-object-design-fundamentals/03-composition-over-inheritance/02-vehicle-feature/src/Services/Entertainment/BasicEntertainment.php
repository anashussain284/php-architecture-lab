<?php
declare(strict_types=1);

namespace App\Services\Entertainment;

use App\Contracts\EntertainmentFeature;

final class BasicEntertainment implements EntertainmentFeature
{
	public function description(): string
	{
		return 'Basic Entertainment';
	}
}