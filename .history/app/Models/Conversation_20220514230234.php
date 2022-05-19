<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    public function userConversation(){
        return $this->belongsTo(User::class, 'partenaire_id');
    }


    public function annonceConversation(){
        return $this->belongsTo('App\Models\Annonce');
    }

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }
}

