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
    Schema::create('ai_audio_jobs', function (Blueprint $table) {
        $table->id();

        // user yang request
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // terkait AI project mana (boleh kosong)
        $table->foreignId('ai_project_id')
              ->nullable()
              ->constrained('ai_projects')
              ->onDelete('set null');

        // prompt deskripsi musik
        $table->text('input_prompt');

        // durasi audio (detik) misal 10 atau 30
        $table->unsignedInteger('duration_seconds')->default(10);

        // status job: pending, processing, done, failed
        $table->string('status')->default('pending');

        // engine AI yang dipakai: misal "musicgen_small", "stable_audio_open"
        $table->string('engine')->nullable();

        // path file audio hasil generasi: misal "audio/ai/job_1.wav"
        $table->string('audio_path')->nullable();

        // kalau gagal, simpan pesan error
        $table->text('error_message')->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('ai_audio_jobs');
}

};