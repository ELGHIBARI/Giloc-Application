<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation_partenaire extends Model
{
    use HasFactory;

    public $table = 'evaluation_partenaire'; 
    public function partenaire(){
        return $this->belongsTo(User::class, 'partenaire_id');
    }

    public function annonce(){
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }
   
    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }

}
