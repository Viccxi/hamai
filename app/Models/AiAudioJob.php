<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiAudioJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ai_project_id',
        'input_prompt',
        'duration_seconds',
        'status',
        'engine',
        'audio_path',
        'error_message',
    ];

    // User yang request
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Project AI terkait
    public function aiProject()
    {
        return $this->belongsTo(AiProject::class, 'ai_project_id');
    }
}
