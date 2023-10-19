<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title_en',
        'title_fr',
        'file_path',
        'file_type',
        'date',
    ];

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
