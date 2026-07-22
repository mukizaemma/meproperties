<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo($this->message->email)
            ->subject('New Contact Message: ' . $this->message->subject)
            ->view('emails.messageNotification')
            ->with([
                'message' => $this->message,
            ]);
    }

    public function attachments(): array
    {
        return [];
    }
}
