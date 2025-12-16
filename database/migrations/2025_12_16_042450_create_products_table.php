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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('file')->nullable();
            $table->unsignedBigInteger('umkm_owner_id');
            $table->unsignedBigInteger('umkm_category_id')->nullable();
            $table->timestamps();
            $table->foreign('umkm_owner_id')->references('id')->on('umkm_owners')->onDelete('cascade');
            $table->foreign('umkm_category_id')->references('id')->on('umkm_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
