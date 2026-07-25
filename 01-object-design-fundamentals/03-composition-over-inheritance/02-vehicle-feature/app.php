<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\VehiclePresenter;
use App\Models\Vehicle;
use App\Services\Engines\PetrolEngine;
use App\Services\Fuel\PetrolFuel;
use App\Services\Entertainment\BasicEntertainment;
use App\Services\Navigation\GpsNavigation;
use App\Services\Safety\BasicSafety;
use App\Services\Transmission\ManualTransmission;

$petrolEngine = new PetrolEngine();
$petrolFuel = new PetrolFuel();
$basicEntertainment = new BasicEntertainment();
$gpsNavigation = new GpsNavigation();
$basicSafety = new BasicSafety();
$manualTransmission = new ManualTransmission();

$santro = new Vehicle(
	name: 'Santro Xing',
	engine: $petrolEngine,
	fule: $petrolFuel,
	entertainment: $basicEntertainment,
	navigation: $gpsNavigation,
	safety: $basicSafety,
	transmission: $manualTransmission
);

$vehiclePresenter = new VehiclePresenter();
$vehiclePresenter->show(vehicle: $santro);