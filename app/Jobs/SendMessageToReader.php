<?php

namespace App\Jobs;

use App\Mail\MailToReader;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMessageToReader implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $email;
    public $title;
    public $slug;
    public $name;
    public $image;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $title, $slug, $name, $image)
    {
        $this->email = $email;
        $this->title = $title;
        $this->slug = $slug;
        $this->name = $name;
        $this->image = $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {
        Mail::to($this->email)->send(new MailToReader($this->title, $this->slug,$this->name,$this->image ));
    }
}
