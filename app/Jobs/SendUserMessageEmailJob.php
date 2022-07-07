<?php

namespace App\Jobs;

use App\Mail\SendUserMessageEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendUserMessageEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $message;
    public $userReceiver;
    public $userSender;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $userReceiver, $userSender)
    {
        $this->message = $message;
        $this->userReceiver = $userReceiver;
        $this->userSender = $userSender;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->userReceiver->email)->send(new SendUserMessageEmail($this->message, $this->userReceiver, $this->userSender));
    }
}
