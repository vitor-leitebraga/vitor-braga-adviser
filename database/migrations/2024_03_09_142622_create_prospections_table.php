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
        Schema::create('prospections', function (Blueprint $table) {
            $table->id();
			$table->foreignId('consumer_id')->constrained('consumers');
			$table->foreignId('client_address_id')->constrained('client_addresses');
			$table->string("categories");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prospections');
    }
};
