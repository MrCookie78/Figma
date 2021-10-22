<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $table = "formations";
    protected $fillable = ['titre', 'description', 'image', 'prix', 'user_id'];

    public function chapitres()
    {
        return $this->hasMany(Chapitre::class, 'formation_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'formations-categories', 'formation_id', 'categorie_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'formations-types', 'formation_id', 'type_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
