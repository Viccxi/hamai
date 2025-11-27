@extends('layouts.app')

@section('title', 'Edit AI Project')

@section('content')
    <div class="card">
        <h2 style="margin-top: 0;">Edit AI Project</h2>

        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ai-projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Judul Project</label>
            <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required>

            <label for="description">Deskripsi / Catatan</label>
            <textarea id="description" name="description" rows="4">{{ old('description', $project->description) }}</textarea>

            <label for="genre">Genre</label>
            <input type="text" id="genre" name="genre" value="{{ old('genre', $project->genre) }}">

            <label for="mood">Mood</label>
            <input type="text" id="mood" name="mood" value="{{ old('mood', $project->mood) }}">

            <label for="bpm">BPM</label>
            <input type="number" id="bpm" name="bpm" value="{{ old('bpm', $project->bpm) }}">

            <label for="key_scale">Key / Scale</label>
            <input type="text" id="key_scale" name="key_scale" value="{{ old('key_scale', $project->key_scale) }}">

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('ai-projects.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
