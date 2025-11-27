<?php

namespace App\Http\Controllers;

use App\Models\AiProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AiProjectController extends Controller
{
    /**
     * Tampilkan daftar AI Project milik user.
     */
    public function index()
    {
        // Sementara: kalau belum pakai auth, pakai user_id = 1
        $userId = Auth::check() ? Auth::id() : 1;

        $projects = AiProject::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ai_projects.index', compact('projects'));
    }

    /**
     * Tampilkan form buat AI Project baru.
     */
    public function create()
    {
        return view('ai_projects.create');
    }

    /**
     * Simpan AI Project baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre'       => 'nullable|string|max:100',
            'mood'        => 'nullable|string|max:100',
            'bpm'         => 'nullable|integer|min:40|max:260',
            'key_scale'   => 'nullable|string|max:10',
        ]);

        $userId = Auth::check() ? Auth::id() : 1;
        $validated['user_id'] = $userId;

        AiProject::create($validated);

        return redirect()->route('ai-projects.index')
            ->with('success', 'AI Project berhasil dibuat.');
    }

    /**
     * Tampilkan detail satu AI Project.
     */
    public function show(AiProject $aiProject)
{
    // Muat juga relasi AI Text & AI Audio (kalau nanti dipakai)
    $aiProject->load('aiTextGenerations', 'aiAudioJobs');

    return view('ai_projects.show', [
        'project' => $aiProject,
    ]);
}


    /**
     * Tampilkan form edit AI Project.
     */
    public function edit(AiProject $aiProject)
    {
        return view('ai_projects.edit', ['project' => $aiProject]);
    }

    /**
     * Update AI Project di database.
     */
    public function update(Request $request, AiProject $aiProject)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre'       => 'nullable|string|max:100',
            'mood'        => 'nullable|string|max:100',
            'bpm'         => 'nullable|integer|min:40|max:260',
            'key_scale'   => 'nullable|string|max:10',
        ]);

        $aiProject->update($validated);

        return redirect()->route('ai-projects.index')
            ->with('success', 'AI Project berhasil diupdate.');
    }

    /**
     * Hapus AI Project.
     */
    public function destroy(AiProject $aiProject)
    {
        $aiProject->delete();

        return redirect()->route('ai-projects.index')
            ->with('success', 'AI Project berhasil dihapus.');
    }
}
