<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation_client extends Model
{
    use HasFactory;

    public $table = 'evaluation_client'; 
    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }
    public function partenaire(){
        return $this->belongsTo(User::class, 'partenaire_id');
    }
}
