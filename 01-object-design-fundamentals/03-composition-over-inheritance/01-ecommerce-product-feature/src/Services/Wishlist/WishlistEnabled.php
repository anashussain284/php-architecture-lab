<?php
declare(strict_types=1);

namespace App\Services\Wishlist;

use App\Contracts\WishlistFeature;

final class WishlistEnabled implements WishlistFeature
{
	public function isWishlist(): bool
	{
		return true;
	}
}