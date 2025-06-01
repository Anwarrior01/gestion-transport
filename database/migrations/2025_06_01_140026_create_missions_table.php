<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('origin');
            $table->string('destination');
            $table->string('trailer_number'); // 	Remorque utilisée (N° Remorque)
            $table->string('vehicle_plate');  // 	Véhicule utilisé (Matricule)
            $table->integer('distance_km');
            $table->decimal('price', 10, 2);      // 	Prix facturé (en MAD)
            $table->decimal('expenses', 10, 2);   // 	Frais engagés (carburant, péage, péage, etc.)
            $table->decimal('profit', 10, 2)->nullable(); // 	Bénéfice net (calculé automatiquement : Prix facturé – Frais)
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
