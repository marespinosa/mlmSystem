<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User; 

class AdminRegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('email.admin_registration_notification')
                    ->subject('New User Registration');
    }


    
   
}
