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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->string('address');
            $table->string('house_number')->nullable();
            $table->string('rt_rw')->nullable();
            $table->string('village')->nullable();
            $table->string('district')->nullable();
            $table->string('region')->nullable();
            $table->string('phone')->nullable();
            $table->string('occupation')->nullable();
            $table->string('donor_card_number')->nullable();
            $table->string('awards')->nullable(); // stored as string '10', '25', etc. or int
            $table->boolean('willing_to_fast')->default(false);
            $table->date('last_donor_date')->nullable();
            $table->integer('total_donations')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
