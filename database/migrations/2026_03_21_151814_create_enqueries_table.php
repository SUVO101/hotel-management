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
        Schema::create('enqueries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->text('message')->nullable();
            $table->dateTime('checkin_date');
            $table->dateTime('checkout_date');
            $table->foreignId('roomtype_id')->constrained()->cascadeOnDelete();
            $table->integer('number_of_rooms')->default(1);
            $table->integer('number_of_adults')->default(1);
            $table->integer('number_of_children')->default(0);
            $table->enum('status', ['new', 'read', 'contacted','replied', 'booked', 'cancelled'])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enqueries');
    }
};
