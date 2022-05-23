<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; 
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Auth;


class SendEmailController extends Controller
{
     
    public function index()
    {
 
      Mail::to("derouachkaoutar@gmail.com")->send(new NotifyMail());
 
      if (Mail::failures()) {
           return ('Sorry! Please try again latter');
      }else{
           return ('Great! Successfully send in your mail');
         }
    } 
}