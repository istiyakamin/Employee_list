<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class sendController extends Controller
{
    public function send()
    {
    	Mail::send(new SendMail());
    }
}
