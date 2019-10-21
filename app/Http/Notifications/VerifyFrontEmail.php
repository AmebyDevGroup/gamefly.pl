<?php

namespace App\Http\Notifications;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use Illuminate\Auth\Notifications\VerifyEmail as Notification;

class VerifyFrontEmail extends Notification
{
    /**
     * Get the verification URL for the given notifiable.
     *
     * @param mixed $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'Front::verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 10080)),
            ['id' => $notifiable->getKey()]
        );
    }
}
