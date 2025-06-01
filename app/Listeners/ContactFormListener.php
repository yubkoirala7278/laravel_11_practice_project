<?php

namespace App\Listeners;

use App\Events\ContactFormEvent;
use App\Mail\ContactFormMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ContactFormListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(ContactFormEvent $event): void
    {
        $contact = $event->contact;

        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new ContactFormMail($contact));
        }
    }
}
