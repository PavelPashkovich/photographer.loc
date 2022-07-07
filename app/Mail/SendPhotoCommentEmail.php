<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPhotoCommentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $photoAuthorName;
    public $messageAuthor;
    public $photoName;
    public $commentMessage;
    public $photoId;
    public $commentUserId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($photo, $commentMessage, $user)
    {
        $this->photoAuthorName = $photo->user->name;
        $this->messageAuthor = $user->name;
        $this->photoName = $photo->name;
        $this->commentMessage = $commentMessage;
        $this->photoId = $photo->slug;
        $this->commentUserId = $user->slug;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@photographer.loc')
            ->view('mail.photo-comment.email')
            ->subject('Notification message!')
            ->with([
                'photoAuthorName' => $this->photoAuthorName,
                'messageAuthor' => $this->messageAuthor,
                'photoName' => $this->photoName,
                'commentMessage' => $this->commentMessage,
                'photoId' => $this->photoId,
                'userId' => $this->commentUserId,
            ]);
    }
}
