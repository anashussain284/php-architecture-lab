<?php
declare(strict_types=1);

namespace App\Contracts;

interface WishlistFeature
{
	public function isWishlist(): bool;
}