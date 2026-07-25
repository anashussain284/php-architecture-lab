<?php
declare(strict_types=1);

namespace App\Services\Entertainment;

use App\Contracts\EntertainmentFeature;

final class CinemaEntertainment implements EntertainmentFeature
{
	public function description(): string
	{
		return 'Cinema Entertainment';
	}
}