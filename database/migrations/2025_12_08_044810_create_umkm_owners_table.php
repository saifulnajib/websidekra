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
        Schema::create('umkm_owners', function (Blueprint $table) {
            $table->id();
            
            // --- Data Pemilik/Pelaku UMKM ---
            $table->string('owner_name');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            
            // --- Data Usaha/Bisnis ---
            $table->string('business_name');
            $table->string('business_slug')->unique();
            $table->foreignId('category_id')->constrained('umkm_categories')->cascadeOnDelete();
            $table->enum('status', ['aktif', 'nonaktif', 'verifikasi'])->default('verifikasi');
            
            // --- Detail Tambahan ---
            $table->year('established_year')->nullable();
            $table->text('description')->nullable();
            $table->string('logo_path')->nullable(); // Path penyimpanan logo
            
            // --- Lokasi (Opsional) ---
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm_owners');
    }
};
