<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view("contact");
    }

    public function store(Request $request)
    {
        //validation rules
        request()->validate([
            "name" => ["required", "between:2,255"],
            "email" => ["required", "email"],
            "message" => ["required", 'regex:/^[^<>]*$/', "min:2"],
            "subject" => ["required", "filled"]
        ]);

        //data versturen
        $data = $request->all(); //wordt verstuurd naar markdown die layout voor email bevat
        $mail = new Contact($data);
        $mail->from($data['email']);
        Mail::to(env("MAIL_FROM_ADDRESS"))
            ->send($mail);
        //return redirect('contact');
        return back()->with("status", "Success! Form received, thank you!");
    }
}
