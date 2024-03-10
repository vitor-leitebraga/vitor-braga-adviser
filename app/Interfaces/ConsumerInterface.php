<?php

namespace App\Interfaces;

use App\Models\Consumer;

interface ConsumerInterface
{
	public function getConsumerOrCreateNew(array $consumerData): Consumer;

	public function syncAddresses(Consumer $consumer, array $clientAddressIds): void;
}
