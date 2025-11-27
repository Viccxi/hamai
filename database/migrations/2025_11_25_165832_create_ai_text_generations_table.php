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
    Schema::create('ai_text_generations', function (Blueprint $table) {
        $table->id();

        // user yang request
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // terkait AI project mana (boleh kosong)
        $table->foreignId('ai_project_id')
              ->nullable()
              ->constrained('ai_projects')
              ->onDelete('set null');

        // jenis text: lyric, chord_progression, song_brief, dll
        $table->string('type');

        // prompt yang dikasih user
        $table->text('input_prompt');

        // hasil AI (bisa lirik panjang, text, dsb.)
        $table->longText('output_text');

        // info tambahan: key, mood, dll (opsional, disimpan JSON)
        $table->json('metadata')->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('ai_text_generations');
}

};
