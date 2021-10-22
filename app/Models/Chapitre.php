<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;

    protected $table = "chapitres";
    protected $fillable = ['titre', 'contenu', 'duree', 'formation_id'];

    public function getFormation()
    {
        return $this->belongsTo(Formation::class, 'id', 'formation_id');
    }
}
