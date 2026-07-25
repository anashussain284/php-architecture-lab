<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\Specification;

interface VehicleFeature
{
	public function specification(): Specification;
}