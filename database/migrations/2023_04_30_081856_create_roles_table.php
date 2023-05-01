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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->unique();
            $table->string('opening_rate')->nullable();
            $table->string('probing_rate')->nullable();
            $table->string('delivering_rate')->nullable();
            $table->string('objection_rate')->nullable();
            $table->string('closing_rate')->nullable();
            $table->string('product_rate')->nullable();
            $table->bigInteger('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
