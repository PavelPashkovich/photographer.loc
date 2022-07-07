<?php

namespace App\Jobs;

use App\Mail\SendPhotoCommentEmail;
use App\Models\Photo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPhotoCommentEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $photo;
    public $commentMessage;
    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($photo, $commentMessage, $user)
    {
        $this->photo = $photo;
        $this->commentMessage = $commentMessage;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->photo->user->email)->send(new SendPhotoCommentEmail($this->photo, $this->commentMessage, $this->user));
    }
}
