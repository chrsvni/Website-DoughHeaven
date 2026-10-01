<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeSubscriberMail extends Mailable
{
    use Queueable, SerializesModels;

    public Subscriber $subscriber;
    public string $voucherCode;

    /**
     * Create a new message instance.
     */
    public function __construct(Subscriber $subscriber, string $voucherCode = 'SWEETWELCOME10')
    {
        $this->subscriber = $subscriber;
        $this->voucherCode = $voucherCode;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🍩 Selamat Datang di Sahabat Manis DoughHeaven! Ada Voucher Spesial Buat Kamu',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome_subscriber',
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
