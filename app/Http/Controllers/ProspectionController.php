<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsumerProspectionRequest;
use App\Services\ClientAddressService;
use App\Services\ConsumerService;
use App\Services\ProspectionService;
use Inertia\Inertia;

class ProspectionController extends Controller
{
	public function __construct(
		protected ConsumerService $consumerService,
		protected ClientAddressService $clientAddressService,
		protected ProspectionService $prospectionService
	)
	{}

    public function index()
    {
		return Inertia::render('Prospection/Index');
    }

    public function store(ConsumerProspectionRequest $request)
    {
		$prospectionFormData = $request->validated();

		$consumerData = $this->consumerService->filterConsumerDataFromProspectionForm($prospectionFormData);
		$consumer = $this->consumerService->getConsumerOrCreateNew($consumerData);

		$addressData = $this->clientAddressService->filterAddressDataFromProspectionForm($prospectionFormData);
		$address = $this->clientAddressService->getAddressOrCreateNew($addressData);

		$this->consumerService->attachAddressToConsumerIfNeeded($consumer, [$address->id]);

		$prospectionData = $this->prospectionService->createProspectionData($prospectionFormData, $consumer->id, $address->id);
		$prospection = $this->prospectionService->create($prospectionData);

		return Inertia::render('Prospection/Done', compact('consumer', 'address', 'prospection'));
    }
}
