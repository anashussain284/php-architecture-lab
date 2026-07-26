<?php
declare(strict_types=1);

namespace App\Services\Wishlist;

use App\Contracts\WishlistFeature;

class WishlistDisabled implements WishlistFeature
{
	public function isWishlist(): bool
	{
		return false;
	}
}