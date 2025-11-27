@extends('layouts.app')

@section('title', 'AI Projects')

@section('content')
    <div class="card">
        <h2 style="margin-top: 0;">AI Projects</h2>

        <a href="{{ route('ai-projects.create') }}" class="btn btn-primary" style="margin-bottom: 12px;">
            + Tambah AI Project
        </a>

        @if($projects->isEmpty())
            <p>Belum ada AI Project. Silakan buat project baru.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Genre</th>
                        <th>Mood</th>
                        <th>BPM</th>
                        <th>Key</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->genre ?? '-' }}</td>
                            <td>{{ $project->mood ?? '-' }}</td>
                            <td>{{ $project->bpm ?? '-' }}</td>
                            <td>{{ $project->key_scale ?? '-' }}</td>
                            <td>
                                <a href="{{ route('ai-projects.show', $project) }}" class="btn btn-secondary" style="margin-bottom: 4px;">
                                    Detail
                                </a>
                                <a href="{{ route('ai-projects.edit', $project) }}" class="btn btn-secondary" style="margin-bottom: 4px;">
                                    Edit
                                </a>
                                <form action="{{ route('ai-projects.destroy', $project) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus AI Project ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
