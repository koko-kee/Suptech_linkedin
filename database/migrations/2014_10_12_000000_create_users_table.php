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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->text('profil')->nullable();
            $table->string('telephone',14)->nullable();
            $table->text('adresse')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignIdFor(\App\Models\Entreprise::class)->nullable();
            $table->foreignIdFor(\App\Models\Niveau::class)->nullable();
            $table->foreignIdFor(\App\Models\Localite::class)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
