<?php

namespace App\Services;

use App\Interfaces\ConsumerInterface;
use App\Models\Consumer;

class ConsumerService
{
	public function __construct(protected ConsumerInterface $consumerRepository)
	{
	}

	public function prepareData(array $prospectionForm): array
	{
		return [
			'first_name' => $prospectionForm['firstname'],
			'last_name' => $prospectionForm['lastname'],
			'email' => $prospectionForm['email'],
			'phone' => $prospectionForm['phone'],
			'contact_preference' => $prospectionForm['contactpreference'],
		];
	}

	public function getConsumerOrCreateNew(array $consumerData): Consumer
	{
		return $this->consumerRepository->getConsumerOrCreateNew($consumerData);
	}

	public function syncAddressData(Consumer $consumer, array $clientAddressIds): void
	{
		$this->consumerRepository->syncAddresses($consumer, $clientAddressIds);
	}
}
