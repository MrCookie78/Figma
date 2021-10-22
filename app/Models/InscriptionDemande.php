<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscriptionDemande extends Model
{
    use HasFactory;

    protected $table = "inscription-demandes";
    public $timestamps = false;

    protected $fillable = ['firstname', 'lastname', 'email'];
}
