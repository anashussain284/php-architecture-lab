<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\VehiclePresenter;
use App\Models\Vehicle;
use App\Services\Engines\DieselEngine;
use App\Services\Engines\PetrolEngine;
use App\Services\Fuel\PetrolFuel;
use App\Services\Entertainment\BasicEntertainment;
use App\Services\Fuel\BatteryFuel;
use App\Services\Navigation\GpsNavigation;
use App\Services\Navigation\NoNavigation;
use App\Services\Safety\BasicSafety;
use App\Services\Transmission\ManualTransmission;
use App\Services\Navigation\PremiumNavigation;
use App\Services\Navigation\Premium\RouteCalculator;
use App\Services\Navigation\Premium\TrafficProvider;
use App\Services\Navigation\Premium\VoiceAssistant;
use App\Services\Safety\AutonomousSafety;

$petrolEngine = new PetrolEngine();
$petrolFuel = new PetrolFuel();
$basicEntertainment = new BasicEntertainment();
$gpsNavigation = new GpsNavigation();
$basicSafety = new BasicSafety();
$manualTransmission = new ManualTransmission();
$routeCalculator = new RouteCalculator();
$trafficProvider = new TrafficProvider();
$voiceAssistant = new VoiceAssistant();

$premiumNavigation = new PremiumNavigation(
	routeCalculator: $routeCalculator,
	trafficProvider: $trafficProvider,
	voiceAssistant: $voiceAssistant
);

$santro = new Vehicle(
    'Santro Xing (Tech Pack)',
    new PetrolEngine(),
    new PetrolFuel(),
    new BasicEntertainment(),
    $premiumNavigation,
    new BasicSafety(),
    new ManualTransmission()
);

$familySedan = new Vehicle(
	'Family Sedan',
	new PetrolEngine(),
	new ManualTransmission(),
	new BasicSafety(),
	new GpsNavigation()
);

$electricSUV = new Vehicle(
	'Electric SUV',
	new BatteryFuel(),
	new AutonomousSafety(),
	$premiumNavigation
);

$heavyTruck = new Vehicle(
	'Heavy Truck',
	new DieselEngine(),
	new BasicSafety(),
	new NoNavigation()
);

$vehiclePresenter = new VehiclePresenter();
$vehiclePresenter->show(vehicle: $santro);
$vehiclePresenter->show(vehicle: $familySedan);
$vehiclePresenter->show(vehicle: $electricSUV);
$vehiclePresenter->show(vehicle: $heavyTruck);