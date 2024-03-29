<?php

namespace App\Core\Auth;

use Illuminate\Support\Facades\URL;

class VerifyEmail extends \Illuminate\Auth\Notifications\VerifyEmail
{
    protected function verificationUrl($notifiable)
    {
        return URL::signedRoute(
            'verification.verify',
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
