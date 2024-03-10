<?php

namespace App\Repositories;

use App\Interfaces\ClientAddressInterface;
use App\Interfaces\ProspectionInterface;
use App\Models\ClientAddress;
use App\Models\Prospection;

class ProspectionRepository implements ProspectionInterface
{
	public function create(array $prospectionData): Prospection
	{
		return Prospection::create($prospectionData);
	}
}
