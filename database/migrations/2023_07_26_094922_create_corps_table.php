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
        Schema::create('corps', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('number');
            $table->decimal('space', 6, 2)->nullable();
            $table->integer('flors');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('status')->default(-1);
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
        Schema::dropIfExists('corps');
    }
};
