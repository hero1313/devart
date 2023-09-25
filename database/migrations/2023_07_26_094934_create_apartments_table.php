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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('corp_number');
            $table->integer('flor_id')->nullable();
            $table->string('number');
            $table->integer('flor')->nullable();
            $table->integer('badrooms');
            $table->decimal('price', 12, 2);
            $table->decimal('space', 6, 2);
            $table->decimal('inside_space', 6, 2);
            $table->decimal('balcony_space', 6, 2)->default(0)->nullable();
            $table->integer('status')->default(-1);
            $table->string('image_d')->nullable();
            $table->string('image')->nullable();
            $table->string('code')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
