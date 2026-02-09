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
        Schema::table('donors', function (Blueprint $table) {
            $table->boolean('willing_to_receive_mail')->default(false)->after('willing_to_fast');
            $table->boolean('willing_to_help_special_needs')->default(false)->after('willing_to_receive_mail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donors', function (Blueprint $table) {
            $table->dropColumn(['willing_to_receive_mail', 'willing_to_help_special_needs']);
        });
    }
};
