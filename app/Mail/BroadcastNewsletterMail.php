<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BroadcastNewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $subjectTitle;
    public string $messageContent;
    public ?string $actionUrl;
    public ?string $actionText;
    public string $type;
    public Subscriber $subscriber;

    /**
     * Create a new message instance.
     */
    public function __construct(
        Subscriber $subscriber,
        string $subjectTitle,
        string $messageContent,
        ?string $actionUrl = null,
        ?string $actionText = null,
        string $type = 'general'
    ) {
        $this->subscriber = $subscriber;
        $this->subjectTitle = $subjectTitle;
        $this->messageContent = $messageContent;
        $this->actionUrl = $actionUrl;
        $this->actionText = $actionText ?: 'Lihat Selengkapnya di Website';
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectTitle,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.broadcast_newsletter',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
