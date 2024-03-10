<?php

namespace App\Repositories;

use App\Interfaces\ConsumerInterface;
use App\Models\ClientAddress;
use App\Models\Consumer;

class ConsumerRepository implements ConsumerInterface
{
	public function getConsumerOrCreateNew(array $consumerData): Consumer
	{
		return Consumer::firstOrCreate($consumerData);
	}

	public function syncAddresses(Consumer $consumer, array $clientAddressIds): void
	{
		$consumer->addresses()->sync($clientAddressIds, false);
	}
}
