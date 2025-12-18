<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Run the migrations.
    public function up(): void
    {
        Schema::create('contact_requests', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'prestation', 'devis', 'evenement', 'question'
            $table->string('service')->nullable(); // Type de service demandé
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('entreprise')->nullable();
            $table->date('date_evenement')->nullable();
            $table->string('lieu')->nullable();
            $table->text('description');
            $table->decimal('budget_estime', 10, 2)->nullable(); // Budget estimé en euros
            $table->string('status')->default('nouveau'); // nouveau, traité, annulé
            $table->text('notes_admin')->nullable(); // Notes internes pour l'administration
            $table->timestamps();
        });
    }

    // Reverse the migrations.
    public function down(): void
    {
        Schema::dropIfExists('contact_requests');
    }
};
