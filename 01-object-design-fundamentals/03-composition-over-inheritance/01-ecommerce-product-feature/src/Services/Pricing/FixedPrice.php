<?php
declare(strict_types=1);

namespace App\Services\Pricing;

use App\Contracts\PricingFeature;
use App\Models\Money;
use App\Services\Pricing\Features\CurrencyConverter;
use App\Services\Pricing\Features\PriceFormatter;
use App\Services\Pricing\Features\TaxCalculator;

final class FixedPrice implements PricingFeature
{
	public function __construct(
		private readonly Money $price,
		private readonly CurrencyConverter $currencyConverter,
		private readonly PriceFormatter $priceFormatter,
		private readonly TaxCalculator $taxCalculator
	) {}

	public function price(): Money
	{
		$tax = $this->taxCalculator->tax();
		$amountInCent = $this->price->amountInCent + $tax;
		return new Money(
			amountInCent: $amountInCent,
			currency: $this->priceFormatter->format() . $this->currencyConverter->convert()
		);
	}
}