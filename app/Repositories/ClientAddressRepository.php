<?php

namespace App\Repositories;

use App\Interfaces\ClientAddressInterface;
use App\Models\ClientAddress;

class ClientAddressRepository implements ClientAddressInterface
{
	public function getAddressOrCreateNew(array $addressData): ClientAddress
	{
		return ClientAddress::firstOrCreate($addressData);
	}
}
