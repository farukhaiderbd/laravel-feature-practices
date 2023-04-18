<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeUserMail extends Mailable  {
     use SerializesModels;

     public function __construct()
          {}

     public function envelope(): Envelope
          {
          return new Envelope(subject: 'Welcome User',);
          }

     public function content(): Content
          {
          return new Content(markdown: 'emails.welcome-user',);
          }

     public function attachments(): array
          {
          return [];
          }
}
