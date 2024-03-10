<?php

namespace App\Interfaces;

use App\Models\ClientAddress;

interface ClientAddressInterface
{
	public function getAddressOrCreateNew(array $addressData): ClientAddress;
}
