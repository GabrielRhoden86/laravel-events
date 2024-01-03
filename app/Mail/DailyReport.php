<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DailyReport extends Mailable
{
    use Queueable, SerializesModels;

    protected $sales;
    protected $date;

    public function __construct($sales, $date)
    {
        $this->sales =$sales;
        $this->date = $date;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Daily Report',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'taskShedule.daily',
        );
    }

        public function build()
        {
            return $this->view('taskShedule.daily', ['sales' => $this->sales,'date' => $this->date]);
        }

    public function attachments(): array
    {
        return [];
    }
}
