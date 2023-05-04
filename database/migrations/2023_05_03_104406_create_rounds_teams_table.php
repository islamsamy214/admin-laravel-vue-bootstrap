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
        Schema::create('rounds_teams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->bigInteger('round_id')->unsigned();
            $table->foreign('round_id')->references('id')->on('rounds')->onDelete('cascade');
            $table->decimal('rate')->nullable();
            $table->json('role_rates')->nullable();

            $table->boolean('is_presentation')->default(false);
            $table->string('opening_rate')->nullable();
            $table->string('probing_rate')->nullable();
            $table->string('delivering_rate')->nullable();
            $table->string('objection_rate')->nullable();
            $table->string('closing_rate')->nullable();
            $table->string('product_rate')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rounds_teams');
    }
};
