<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUserMessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $messageAuthor;
    public $userMessage;
    public $messageUserId;
    public $messageAuthorEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $userReceiver, $userSender)
    {
        $this->userName = $userReceiver->name;
        $this->messageAuthor = $userSender->name;
        $this->userMessage = $message;
        $this->messageUserId = $userSender->slug;
        $this->messageAuthorEmail = $userSender->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@photographer.loc')
            ->view('mail.user-message.email')
            ->subject('Notification message!')
            ->with([
                'userName' => $this->userName,
                'messageAuthor' => $this->messageAuthor,
                'userMessage' => $this->userMessage,
                'messageUserId' => $this->messageUserId,
                'messageAuthorEmail' => $this->messageAuthorEmail,
            ]);
    }
}
