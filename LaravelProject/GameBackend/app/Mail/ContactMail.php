<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    // Declaramos variables de manera explícita
    public string $senderName;
    public string $senderEmail;
    public string $mailSubject;
    public string $messageContent;
    // Propiedades en la vista del mail

    public function __construct($senderName, $senderEmail, $mailSubject, $messageContent)
    {
        $this->senderName     = $senderName;
        $this->senderEmail    = $senderEmail;
        $this->mailSubject    = $mailSubject;
        $this->messageContent = $messageContent;
    }

 
    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mailSubject,
            replyTo: [$this->senderEmail]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
