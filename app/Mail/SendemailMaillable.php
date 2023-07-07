<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendemailMaillable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private $name, private $username, private $password)
    {
        //
    }

    public function build(){
        return $this->from('sistempamsimas@gmail.com')
                    ->view('admin.mail.index')
                    ->with([
                        'name' => $this->name,
                        'username' => $this->username, 
                        'password' => $this->password
                    ]);
    }

    /**
     * Get the message envelope
     * 
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('sistempamsimas@gmail.com', 'Sistem PAMSIMAS'),
            subject: 'Sistem PAMSIMAS: Your New Account is Created!',
        );
    }

    /**
     * Get the message content definition.
     * 
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.mail.index',
            with: ['name' => $this->name, 'username' => $this->username, 'password' => $this->password],
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
