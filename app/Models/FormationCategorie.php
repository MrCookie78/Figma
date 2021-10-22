<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationCategorie extends Model
{
    use HasFactory;

    protected $table = "formations-categories";
    public $timestamps = false;

    protected $fillable = ['formation_id', 'categorie_id'];
}
