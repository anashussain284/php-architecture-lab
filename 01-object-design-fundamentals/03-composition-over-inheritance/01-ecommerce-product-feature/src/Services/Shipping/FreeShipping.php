<?php
declare(strict_types=1);

namespace App\Services\Shipping;

use App\Contracts\ShippingFeature;
use App\Models\Money;

final class FreeShipping implements ShippingFeature
{
	public function shippingCost(): Money
	{
		return new Money(
			amountInCent: 0,
			currency: 'USD'
		);
	}
}