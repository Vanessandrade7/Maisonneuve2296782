<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $dates = ['date_de_naissance'];

    protected $fillable = [
        'nom',
        'adresse',
        'phone',
        'email',
        'date_de_naissance',
        'ville_id'
    ];

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
