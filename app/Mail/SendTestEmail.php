<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendTestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $mailMessage)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                'vijayakarthikwrk@gmail.com',
                'Programming Fields'
            ),
            replyTo: [
                new Address('vijayakarthik13@gmail.com', 'VK')
            ],
            subject: 'Send Test Email',
        );
    }

public function content(): Content
{
    return new Content(
        view: 'mails.test-mail',
        with: [
            'mailMessage' => $this->mailMessage,
        ]
    );
}

    public function attachments(): array
    {
        return [];
    }
}
