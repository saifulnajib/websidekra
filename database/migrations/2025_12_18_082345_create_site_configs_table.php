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
        Schema::create('site_configs', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // Kunci konfigurasi (logo, site_title, dll)
            $table->text('value')->nullable(); // Nilai konfigurasi
            $table->string('type')->default('text'); // Tipe data: text, file, json, boolean, number
            $table->string('group')->default('general'); // Grup konfigurasi: general, contact, social, seo
            $table->string('label')->nullable(); // Label untuk display
            $table->text('description')->nullable(); // Deskripsi konfigurasi
            $table->boolean('is_public')->default(true); // Apakah bisa diakses publik
            $table->integer('sort_order')->default(0); // Urutan tampilan
            $table->timestamps();

            $table->index(['group', 'is_public']);
            $table->index('key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_configs');
    }
};
