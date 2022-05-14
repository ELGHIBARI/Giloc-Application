<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    public function userDemande(){
        return $this->belongsTo(User::class, 'client_id');
    }

    public function userAnnonce(){
        return $this->belongsTo(Annonce::class, 'user_id');
    }
}
