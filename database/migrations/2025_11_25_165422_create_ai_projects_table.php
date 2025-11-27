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
    Schema::create('ai_projects', function (Blueprint $table) {
        $table->id();

        // siapa yang bikin project AI ini
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // judul project AI, misal: "Emo Shoegaze Ambient 120BPM"
        $table->string('title');

        // deskripsi bebas, catatan, ide
        $table->text('description')->nullable();

        // info musik (opsional tapi kepake)
        $table->string('genre')->nullable();     // rock, emo, orchestral, etc
        $table->string('mood')->nullable();      // sad, dark, epic, dll
        $table->unsignedInteger('bpm')->nullable();
        $table->string('key_scale')->nullable(); // misal: Am, Em, C, G

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('ai_projects');
}

};
