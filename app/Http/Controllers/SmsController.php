<?php

namespace App\Http\Controllers;

use App\Notifications\WelcomeSmsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SmsController extends Controller
{
    public function send(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'phone' => 'required',
            'mssg' => 'required',
        ]);

        // Get the phone number and message from the form
        $phone = $validatedData['phone'];
        $message = $validatedData['mssg'];

        // Send SMS notification
        $result = Notification::route('vonage', $phone)
            ->notify(new WelcomeSmsNotification($phone, $message));

        // Check if the SMS was sent successfully
        if ($result > 0) {
            return back()->with('success', 'Message Sent Successfully');
            
        } else {
            return back()->with('error', 'Failed to send SMS');
        }
        // return back()->with('success', 'Message Sent Successfully');
    }
}
