<?php

namespace App\Services;

use App\Interfaces\ProspectionInterface;
use App\Models\Prospection;

class ProspectionService
{
	public function __construct(protected ProspectionInterface $prospectionRepository)
	{
	}

	public function createProspectionData(array $prospectionForm, int $consumerId, int $clientAddressId): array
	{
		return [
			'consumer_id' => $consumerId,
			'client_address_id' => $clientAddressId,
			'categories' => implode(',', $prospectionForm['categories']),
		];
	}

	public function create(array $prospectionData): Prospection
	{
		return $this->prospectionRepository->create($prospectionData);
	}
}
