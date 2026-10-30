<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{

public function store(Request $request)
{
    $validated = $request->validate([
        'h_name'    => 'required|string|max:255',
        'h_email'   => 'required|email|max:255',
        'h_phone'   => 'required|string|max:20',
        'h_subject' => 'required|string|max:255',
        'h_message' => 'required|string',
    ]);

    // Save the enquiry to the database first.
    $contactMessage = ContactMessage::create([
        'h_name'       => $validated['h_name'],
        'h_email'      => $validated['h_email'],
        'h_phone'      => $validated['h_phone'],
        'h_subject'    => $validated['h_subject'],
        'form_message' => $validated['h_message'],
    ]);

    try {
        $adminEmail = config('mail.admin_address');

        if (!$adminEmail) {
            throw new \RuntimeException(
                'MAIL_ADMIN_ADDRESS is not configured.'
            );
        }

        Mail::to($adminEmail)->send(
            new ContactFormMail($contactMessage)
        );

        return back()->with(
            'success',
            'Thank you! Your enquiry was sent successfully.'
        );

    } catch (\Throwable $e) {
        Log::error('Contact form email failed', [
            'contact_message_id' => $contactMessage->id,
            'error' => $e->getMessage(),
        ]);

        return back()->with(
            'error',
            'Your enquiry was saved, but the email could not be sent.'
        );
    }
}

}
