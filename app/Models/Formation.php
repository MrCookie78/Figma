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

    public function sumDureeChapitre()
    {
        $chapitres = $this->hasMany(Chapitre::class, 'formation_id', 'id')->get();

        $sumSeconds = 0;
        foreach ($chapitres as $chapitre) {
            $explodedTime = explode(':', $chapitre->duree);
            $seconds = $explodedTime[0] * 3600 + $explodedTime[1] * 60 + $explodedTime[2];
            $sumSeconds = $sumSeconds + $seconds;
        }
        $hours = floor($sumSeconds / 3600);
        $minutes = floor(($sumSeconds % 3600) / 60);
        if (strlen($minutes) == 1) {
            $minutes = "0" . $minutes;
        }
        $sumTime = $hours . 'h' . $minutes . 'm';

        return $sumTime;
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

    public function heureFormat($time)
    {
        $explodedTime = explode(':', $time);
        if (strlen($explodedTime[1]) == 1) {
            $explodedTime[0] = "0" . $explodedTime[0];
        }
        return $explodedTime[0] . "h" . $explodedTime[1];
    }
}
