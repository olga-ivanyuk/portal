<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailToReader extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $slug;
    public $name;
    public $image;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $title, $slug, $name, $image)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->name = $name;
        $this->image = $image;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Mail To Reader',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.new-post',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
