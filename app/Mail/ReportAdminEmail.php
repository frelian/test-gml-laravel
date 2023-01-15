<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportAdminEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $reportData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reportData)
    {
        $this->reportData = $reportData;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Reporte GML-Users',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $array = $this->reportData->toArray();

        $data = [
            'report' => $array,
        ];

        return new Content(
            view: 'email.reportAdmin',
            with: $data
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    /**
     * Build the message.
     *
     * @return $this`enter code here`
     */
    public function build()
    {
        return $this->subject("Mail from posts")->view('email.reportAdmin');
    }
}
