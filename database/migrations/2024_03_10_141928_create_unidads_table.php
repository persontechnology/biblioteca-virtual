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
        Schema::create('unidads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->unsignedBigInteger('unidad_padre_id')->nullable();
            $table->foreign('unidad_padre_id')->references('id')->on('unidads')->onDelete('cascade');
            $table->foreignId('curso_id')->constrained(
                table: 'cursos'
            )->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidads');
    }
};
