<?php

namespace App\Listeners;

use App\Mail\WelcomeUserMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class NewUserRegisterListener {

     public function __construct()
     {
     }


     public function handle($event): void
      {
          Mail::to($event->user->email)->send(new WelcomeUserMail());
//        dd('listener registration');
      }
}
