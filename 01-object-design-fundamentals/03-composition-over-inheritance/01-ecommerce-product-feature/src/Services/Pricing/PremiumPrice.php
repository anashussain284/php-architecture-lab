<?php
declare(strict_types=1);

namespace App\Services\Pricing;

use App\Contracts\PricingFeature;
use App\Models\Money;use App\Services\Pricing\Features\CurrencyConverter;
use App\Services\Pricing\Features\PriceFormatter;
use App\Services\Pricing\Features\TaxCalculator;

final class PremiumPrice implements PricingFeature
{
	public function __construct(
		private readonly int $amount,
		private readonly CurrencyConverter $currencyConverter,
		private readonly PriceFormatter $priceFormatter,
		private readonly TaxCalculator $taxCalculator
	) {}

	public function price(): Money
	{
		$tax = $this->taxCalculator->tax();
		$amountInCent = $this->amount + $tax;
		return new Money(
			amountInCent: $amountInCent,
			currency: $this->priceFormatter->format() . $this->currencyConverter->convert()
		);
	}
}