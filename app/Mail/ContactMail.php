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

    /**
     * Create a new message instance.
     */
    public $Contact_name;
    public $Contact_Message;
    public $contact_mail;
    public function __construct($contactmail, $contactname,$contatmessage)
    {
        //
        $this->Contact_name=$contactname;
        $this->Contact_Message=$contatmessage;
        $this->contact_mail=$contactmail;
    }
    public function build()
    {
        return $this->from($this->contact_mail,$this->Contact_name)->subject('Mail được gửi đến'.$this->Contact_name)->view('View_contact');
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'View_contact',
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
