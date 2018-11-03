<?php

namespace App\Console\Commands;

use App\Mail\RemainderNotification;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
class EmailUsers extends Command
{

    protected $signature = 'email:users';


    protected $description = 'Email the users whose are not verified yet';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $users=User::select('email','name','token')
                   ->where('verified', '0')
                   ->get();
        if($users->count() > 0)
        {
            $users->map(function ($user)
            {
                Mail::to($user->email)->send(new RemainderNotification($user));
            });
        }


        /*
       info(json_decode($users));
       if (\is_array($users)){
           foreach ($users as $user)
               $this->info($user->email);
           $this->line('');
       }

           $email_users = $users->filter(function ($user){
           return $user->posts()->count() == 0;   //? true:false;
       });
       info($email_users);
       if (\is_array($email_users)){
           foreach ($email_users as $user)
               $this->info($user->email);
               $this->line('');
       }
       */


    }
}
