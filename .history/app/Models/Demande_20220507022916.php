<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    public function userDemande(){
        return $this->belongsTo('App\Models\User');
    }

    public function userAnnonce(){
        return $this->belongsTo('App\Models\Annonce');
    }
}
