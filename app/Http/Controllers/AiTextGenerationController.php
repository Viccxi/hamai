<?php

namespace App\Http\Controllers;

use App\Models\AiProject;
use App\Models\AiTextGeneration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AiTextGenerationController extends Controller
{
    /**
     * Simpan hasil "AI Text" baru untuk sebuah AI Project.
     */
    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'ai_project_id' => 'required|exists:ai_projects,id',
            'type'          => 'required|string|in:lyric,song_brief,chord_progression',
            'input_prompt'  => 'required|string',
        ]);

        $userId = Auth::check() ? Auth::id() : 1;

        // SEMENTARA: dummy output AI
        // Nanti bisa diganti panggil AI beneran
        $fakeOutput = "=== DUMMY AI OUTPUT ({$validated['type']}) ===\n\n" . $validated['input_prompt'];

        $generation = AiTextGeneration::create([
            'user_id'       => $userId,
            'ai_project_id' => $validated['ai_project_id'],
            'type'          => $validated['type'],
            'input_prompt'  => $validated['input_prompt'],
            'output_text'   => $fakeOutput,
            'metadata'      => null,
        ]);

        return redirect()
            ->route('ai-projects.show', $validated['ai_project_id'])
            ->with('success', 'AI Text berhasil dibuat (dummy).');
    }
}
