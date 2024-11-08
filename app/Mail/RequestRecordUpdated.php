<?php

namespace App\Mail;

use App\Models\RequestRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestRecordUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $req; // The request record instance

    /**
     * Create a new message instance.
     *
     * @param RequestRecord $req
     * @return void
     */
    public function __construct(RequestRecord $req)
    {
        $this->req = $req; // Pass the request record instance to the mailable
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.request_record_updated') // Define the email view
            ->subject('Admin - Recov-ai | Medical Record') // Subject
            ->with('req', $this->req); // Pass the request record data to the view
    }
}
