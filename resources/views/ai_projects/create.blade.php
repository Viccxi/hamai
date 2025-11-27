@extends('layouts.app')

@section('title', 'Buat AI Project')

@section('content')
    <div class="card">
        <h2 style="margin-top: 0;">Buat AI Project Baru</h2>

        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ai-projects.store') }}" method="POST">
            @csrf

            <label for="title">Judul Project</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>

            <label for="description">Deskripsi / Catatan</label>
            <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>

            <label for="genre">Genre (misal: Emo Rock, Shoegaze)</label>
            <input type="text" id="genre" name="genre" value="{{ old('genre') }}">

            <label for="mood">Mood (misal: Sad, Dark, Hopeful)</label>
            <input type="text" id="mood" name="mood" value="{{ old('mood') }}">

            <label for="bpm">BPM (opsional)</label>
            <input type="number" id="bpm" name="bpm" value="{{ old('bpm') }}">

            <label for="key_scale">Key / Scale (misal: Am, Em, C)</label>
            <input type="text" id="key_scale" name="key_scale" value="{{ old('key_scale') }}">

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('ai-projects.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
