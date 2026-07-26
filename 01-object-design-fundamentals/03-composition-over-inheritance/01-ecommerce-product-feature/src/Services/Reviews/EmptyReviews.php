<?php
declare(strict_types=1);

namespace App\Services\Reviews;

use App\Contracts\ReviewFeature;

class EmptyReviews implements ReviewFeature
{
	public function summary(): string
	{
		return 'No reviews yet.';
	}
}