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
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->string('original_url');
            $table->string('shortened_url')->unique();
            $table->integer('click_count')->default(0);
            $table->timestamp('created_at');

            // Coluna de rastreamento
            $table->json('tracking_data')->nullable();
        });

        Schema::create('clicks', function (Blueprint $table) {
            $table->id();
            $table->foreingID('url_id')->constrained()->onDelete('cascade');
            $table->string('ip_address')->nullable();
            $table->timestamp('created_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
