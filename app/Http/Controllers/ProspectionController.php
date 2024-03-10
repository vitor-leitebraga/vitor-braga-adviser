<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsumerProspectionRequest;
use App\Services\ClientAddressService;
use App\Services\ConsumerService;
use App\Services\ProspectionService;
use Inertia\Inertia;
use Inertia\Response;

class ProspectionController extends Controller
{
	public function __construct(
		protected ConsumerService $consumerService,
		protected ClientAddressService $clientAddressService,
		protected ProspectionService $prospectionService
	)
	{}

    public function index(): Response
    {
		return Inertia::render('Prospection/Index');
    }

    public function store(ConsumerProspectionRequest $request): Response
    {
		$prospectionFormData = $request->validated();

		$consumerData = $this->consumerService->prepareData($prospectionFormData);
		$consumer = $this->consumerService->getConsumerOrCreateNew($consumerData);

		$addressData = $this->clientAddressService->prepareData($prospectionFormData);
		$address = $this->clientAddressService->getAddressOrCreateNew($addressData);

		$this->consumerService->syncAddressData($consumer, [$address->id]);

		$prospectionData = $this->prospectionService->prepareData($prospectionFormData, $consumer->id, $address->id);
		$prospection = $this->prospectionService->create($prospectionData);

		return Inertia::render('Prospection/ProspectionDone', compact('consumer', 'address', 'prospection'));
    }
}
