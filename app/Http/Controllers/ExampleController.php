<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ExampleController extends Controller
{
    public function show(){
        return 'Welcome to my first controller';
    }
    //

    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }

    public function createSession(){
        session()->put('testSession','My first session value');
        return 'session created ' . session('testSession');
    }

    public function contact(){
        return view('contact');
    }

    public function sendMail(Request $request){
        $name = $request->name;
		$email = $request->email;
		$phone = $request->phone;
		$subject = $request->subject;
        $message = $request->message;

		Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($name, $email, $phone, $subject, $message));
        return "Mail Sent Successfully";
    }
}