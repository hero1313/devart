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
        Schema::create('flors', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('corp_number');
            $table->integer('flor_number');
            $table->decimal('space', 6, 2)->nullable();
            $table->string('image')->nullable();
            $table->longText('image_d')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flors');
    }
};
