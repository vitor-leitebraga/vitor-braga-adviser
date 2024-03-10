<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_address_consumer', function (Blueprint $table) {
			$table->unsignedBigInteger('consumer_id');
			$table->unsignedBigInteger('client_address_id');
			$table->timestamps();

			$table->foreign('consumer_id')->references('id')->on('consumers');
			$table->foreign('client_address_id')->references('id')->on('client_addresses');

//			$table->unique(['consumer_id', 'client_address_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_address_consumer');
    }
};
