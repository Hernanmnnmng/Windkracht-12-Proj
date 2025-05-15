<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public Reservation $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bevestiging van je reservering bij Windkracht-12',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.reservation-approved',
            with: [
                'reservation' => $this->reservation,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }

}
