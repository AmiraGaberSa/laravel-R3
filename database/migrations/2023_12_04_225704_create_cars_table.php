<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.لانشاء قاعدة البيانات
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->longText('description');
            $table->boolean('published');
            $table->string('image', 100);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.لحذف قاعدة البيانات
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
