<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();

            $table->string('equipment_code')->unique();
            $table->string('equipment_name');
            $table->string('category');

            $table->integer('stock')->default(1);

            $table->enum('status', [
                'available',
                'borrowed',
                'maintenance'
            ])->default('available');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};