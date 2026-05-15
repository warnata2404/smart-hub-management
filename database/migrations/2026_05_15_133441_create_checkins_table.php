<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('checkins', function (Blueprint $table) {

            $table->id();

            $table->foreignId('booking_id')
                ->constrained()
                ->onDelete('cascade');

            $table->dateTime('checked_in_at')->nullable();

            $table->dateTime('checked_out_at')->nullable();

            $table->text('condition_notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checkins');
    }
};