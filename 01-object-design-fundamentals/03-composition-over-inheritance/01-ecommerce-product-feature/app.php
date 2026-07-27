<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\ProductPresenter;
use App\Models\Product;
use App\Models\Money;

use App\Services\Pricing\FixedPrice;
use App\Services\Pricing\DiscountPrice;
use App\Services\Inventory\FiniteInventory;
use App\Services\Inventory\InfiniteInventory;
use App\Services\Inventory\OutOfStockInventory;
use App\Services\Reviews\SimpleReviews;
use App\Services\Shipping\PaidShipping;
use App\Services\Wishlist\WishlistEnabled;
use App\Services\Pricing\Features\CurrencyConverter;
use App\Services\Pricing\Features\PriceFormatter;
use App\Services\Pricing\Features\TaxCalculator;
use App\Services\Pricing\PremiumPrice;
use App\Services\Reviews\FeaturedReviews;
use App\Services\Shipping\DigitalShipping;
use App\Services\Shipping\FreeShipping;

$money = new Money(
	amountInCent: 10000,
	currency: 'USD'
);
$fixedPrice = new FixedPrice(
	price: $money,
	currencyConverter: new CurrencyConverter(),
	priceFormatter: new PriceFormatter(),
	taxCalculator: new TaxCalculator()
);
$discountPrice = new DiscountPrice(
	amount: 20000,
	discount: 75,
	currencyConverter: new CurrencyConverter(),
	priceFormatter: new PriceFormatter(),
	taxCalculator: new TaxCalculator()
);
$finiteInventory = new FiniteInventory(quantity: 1);
$infiniteInventory = new InfiniteInventory();
$outOfStockInventory = new OutOfStockInventory();
$simpleReviews = new SimpleReviews(rating: 4.5);
$paidShipping = new PaidShipping(amount: 500);
$wishlistEnabled = new WishlistEnabled();

$mobile = new Product(
	name: 'Mobile',
	pricing: $fixedPrice,
	inventory: $outOfStockInventory,
	review: $simpleReviews,
	shipping: $paidShipping,
	wishlist: $wishlistEnabled
);
$productPresenter = new ProductPresenter();
$productPresenter->show(product: $mobile);

$gamingKeyboard = new Product(
	name: 'Gaming Keyboard',
	pricing: $discountPrice,
	inventory: $outOfStockInventory,
	review: new FeaturedReviews(),
	shipping: new FreeShipping(),
	wishlist: $wishlistEnabled
);

$productPresenter->show(product: $gamingKeyboard);

$ebook = new Product(
	name: 'E-Book',
	pricing: $fixedPrice,
	inventory: $infiniteInventory,
	review: new FeaturedReviews(),
	shipping: new DigitalShipping(),
	wishlist: $wishlistEnabled
);

$productPresenter->show(product: $ebook);

$premiumPrice = new PremiumPrice(
	amount: 50000,
	currencyConverter: new CurrencyConverter(),
	priceFormatter: new PriceFormatter(),
	taxCalculator: new TaxCalculator()
);

$luxuryWatch = new Product(
	name: 'Luxury Watch',
	pricing: $premiumPrice,
	inventory: $infiniteInventory,
	review: $simpleReviews,
	shipping: $paidShipping,
	wishlist: $wishlistEnabled
);

$productPresenter->show(product: $luxuryWatch);