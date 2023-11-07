<?php

namespace App\Http\Controllers;

use App\Mail\MailConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from e-kelurahan',
            'body' => 'email ini untuk testing',
        ];

        Mail::to("ergi@suryamicrosystem.com")->send(new MailConfirmation($details));
        return "EMAIL SEND";
    }
}
