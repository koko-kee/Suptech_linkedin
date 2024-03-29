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
        Schema::create('offres', function (Blueprint $table){
            $table->id();
            $table->string('libelle');
            $table->text('description');
            $table->string('localisation')->nullable();
            $table->date('date_limite')->nullable();
            $table->foreignIdFor(\App\Models\StatutOffre::class)->nullable();
            $table->foreignIdFor(\App\Models\TypeContrat::class)->nullable();
            $table->foreignIdFor(\App\Models\Entreprise::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
