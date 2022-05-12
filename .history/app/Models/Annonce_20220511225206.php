<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function conversationAnnonce(){
        return $this->hasMany('App\Models\Conversation');
    }

    public function demandeAnnonce(){
        return $this->hasMany(Demande::class, 'annonce_id');
    }
}
