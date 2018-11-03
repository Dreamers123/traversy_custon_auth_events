<?php

namespace App\Listeners;
use App\Mail\Verification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\user;
class UserCreatedListener implements ShouldQueue
{
   public $user;

    public function __construct(User $user)
    {
        $this->user=$user;
    }


    public function handle($event)
    {
       $email=$event->user->email;

       Mail::to($email)->send(new Verification($event->user));
    }
}
