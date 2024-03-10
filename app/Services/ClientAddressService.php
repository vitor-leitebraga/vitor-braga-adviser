<?php

namespace App\Services;

use App\Interfaces\ClientAddressInterface;
use App\Models\ClientAddress;

class ClientAddressService
{
	public function __construct(protected ClientAddressInterface $clientAddressRepository)
	{
	}

	public function filterAddressDataFromProspectionForm(array $prospectionForm): array
	{
		return [
			'address' => $prospectionForm['address'],
			'complement' => $prospectionForm['complement'],
			'state' => $prospectionForm['state'],
			'city' => $prospectionForm['city'],
			'zip_code' => $prospectionForm['zipcode'],
		];
	}

	public function getAddressOrCreateNew(array $addressData): ClientAddress
	{
		return $this->clientAddressRepository->getAddressOrCreateNew($addressData);
	}
}
