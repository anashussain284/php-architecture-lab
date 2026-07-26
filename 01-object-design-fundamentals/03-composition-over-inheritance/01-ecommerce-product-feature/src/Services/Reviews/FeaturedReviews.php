<?php
declare(strict_types=1);

namespace App\Services\Reviews;

use App\Contracts\ReviewFeature;

class FeaturedReviews implements ReviewFeature
{
	public function summary(): string
	{
		return '⭐ Best Seller Product';
	}
}