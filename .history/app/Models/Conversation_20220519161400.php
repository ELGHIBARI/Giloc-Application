<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    public function userConversation(){
        return $this->belongsTo(User::class, 'client_id');
    }
    public function userConversation2(){
        return $this->belongsTo(User::class, 'partenaire_id');
    }

    public function annonceConversation(){
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'conversation_id');
    }
}

