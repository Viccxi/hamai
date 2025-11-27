<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'genre',
        'mood',
        'bpm',
        'key_scale',
    ];

    // Relasi ke User (pemilik project AI)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke AI Text Generations (lirik, chord, brief, dll)
    public function aiTextGenerations()
    {
        return $this->hasMany(AiTextGeneration::class);
    }

    // Relasi ke AI Audio Jobs (job generate audio)
    public function aiAudioJobs()
    {
        return $this->hasMany(AiAudioJob::class);
    }
}
