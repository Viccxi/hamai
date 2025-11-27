@extends('layouts.app')

@section('title', 'Detail AI Project')

@section('content')
    <div class="card">
        <h2 style="margin-top: 0;">Detail AI Project</h2>

        <p><strong>Judul:</strong> {{ $project->title }}</p>
        <p><strong>Deskripsi:</strong><br> {{ $project->description ?? '-' }}</p>
        <p><strong>Genre:</strong> {{ $project->genre ?? '-' }}</p>
        <p><strong>Mood:</strong> {{ $project->mood ?? '-' }}</p>
        <p><strong>BPM:</strong> {{ $project->bpm ?? '-' }}</p>
        <p><strong>Key / Scale:</strong> {{ $project->key_scale ?? '-' }}</p>

        <a href="{{ route('ai-projects.edit', $project) }}" class="btn btn-primary">Edit Project</a>
        <a href="{{ route('ai-projects.index') }}" class="btn btn-secondary">Kembali ke List</a>
    </div>

    {{-- BAGIAN AI TEXT GENERATIONS --}}
    <div class="card">
        <h3 style="margin-top: 0;">AI Text Generations</h3>

        {{-- Form untuk generate AI Text baru --}}
        <h4>Buat AI Text Baru</h4>

        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ai-text-generations.store') }}" method="POST" style="margin-bottom: 20px;">
            @csrf

            {{-- Project ID tersembunyi --}}
            <input type="hidden" name="ai_project_id" value="{{ $project->id }}">

            <label for="type">Jenis AI Text</label>
            <select id="type" name="type" required>
                <option value="lyric">Lyric</option>
                <option value="song_brief">Song Brief</option>
                <option value="chord_progression">Chord Progression</option>
            </select>

            <label for="input_prompt">Prompt / Instruksi ke AI</label>
            <textarea id="input_prompt" name="input_prompt" rows="4" placeholder="Contoh: Buat lirik emo tentang gagal jadi musisi internasional..."></textarea>

            <button type="submit" class="btn btn-primary">Generate (Dummy)</button>
        </form>

        {{-- List hasil AI Text --}}
        <h4>Riwayat AI Text</h4>

        @if ($project->aiTextGenerations->isEmpty())
            <p>Belum ada AI Text untuk project ini.</p>
        @else
            @foreach ($project->aiTextGenerations as $gen)
                <div style="border-top: 1px solid #333; padding-top: 10px; margin-top: 10px;">
                    <p style="margin-bottom: 4px;">
                        <strong>Type:</strong> {{ $gen->type }}<br>
                        <strong>Dibuat:</strong> {{ $gen->created_at }}
                    </p>
                    <details>
                        <summary style="cursor: pointer;">Lihat hasil</summary>
                        <pre style="white-space: pre-wrap; font-size: 13px; background:#000; padding:8px; border-radius:6px; margin-top:6px;">
{{ $gen->output_text }}
                        </pre>
                    </details>
                </div>
            @endforeach
        @endif
    </div>
@endsection
