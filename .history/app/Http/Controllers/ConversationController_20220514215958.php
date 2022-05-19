<?php

namespace App\Http\Controllers;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
    $conversation=Conversation::where('partenaire_id',Auth::user()->id);
    }
}
