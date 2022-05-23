<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation_objet extends Model
{
    use HasFactory;

    public $table = 'evaluation_objet'; 
    public function annonce(){
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'client_id');
    }

    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }
}
