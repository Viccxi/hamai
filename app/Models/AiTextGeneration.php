<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiTextGeneration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ai_project_id',
        'type',
        'input_prompt',
        'output_text',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
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
