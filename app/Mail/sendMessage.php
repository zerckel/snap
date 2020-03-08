<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMessage extends Mailable
{
    use Queueable, SerializesModels;


    public $message;
    public $name;
    public $mail;
    public $object;
    public $code;

    /**
     * Create a new message instance.
     *
     * @param $message
     * @param $name
     * @param $mail
     * @param $object
     * @param $code
     */
    public function __construct($message, $name, $mail, $object, $code)
    {
        $this->message = $message;
        $this->name = $name;
        $this->mail = $mail;
        $this->object = $object;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this ->mail, 'SnapMail')
            ->subject($this->object)
            ->markdown('emails.message')
            ->with([
                'name' => $this->name,
                'message' => $this->message,
                'code' => $this->code
            ]);
    }
}
