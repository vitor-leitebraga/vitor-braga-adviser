<?php

namespace App\Providers;

use App\Interfaces\ClientAddressInterface;
use App\Interfaces\ConsumerInterface;
use App\Interfaces\ProspectionInterface;
use App\Repositories\ClientAddressRepository;
use App\Repositories\ConsumerRepository;
use App\Repositories\ProspectionRepository;
use App\Services\ClientAddressService;
use App\Services\ConsumerService;
use App\Services\ProspectionService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
		$this->app->bind(ConsumerInterface::class, ConsumerRepository::class);
		$this->app->bind(ConsumerService::class, function($app){
			return new ConsumerService($app->make(ConsumerInterface::class));
		});

		$this->app->bind(ClientAddressInterface::class, ClientAddressRepository::class);
		$this->app->bind(ClientAddressService::class, function($app){
			return new ClientAddressService($app->make(ClientAddressInterface::class));
		});

		$this->app->bind(ProspectionInterface::class, ProspectionRepository::class);
		$this->app->bind(ProspectionService::class, function($app){
			return new ProspectionService($app->make(ProspectionInterface::class));
		});
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
