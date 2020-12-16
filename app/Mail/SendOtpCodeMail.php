<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user, $pesan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $pesan)
    {
        //
        $this->user = $user;
        $this->pesan = $pesan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.otp_code')
                            ->with([
                                'user' => $this->user,
                                'pesan' => $this->pesan,
                            ]);
    }
}
