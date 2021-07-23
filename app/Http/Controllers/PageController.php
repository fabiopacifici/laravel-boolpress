<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{

    public function index()
    {
        # code...
        return view('guests.welcome');
    }

    public function about()
    {
        return view('guests.about');
    }


    public function contacts()
    {
        return view('guests.contacts');
    }


    public function sendContactForm(Request $request)
    {
        // Valida i dati
        //ddd($request->all());
        $validatedData = $request->validate([
            "full_name" => "required",
            "email" => "required |email",
            "message" => "required",
        ]);
        //ddd($validatedData);
        // Invia la mail
        //Visualizza solo senza inviare
        //return (new ContactFormMail($validatedData))->render();

        Mail::to('admin@test.com')->send(new ContactFormMail($validatedData));
        return redirect()
        ->back()
        ->with('message', 'Success! Grazie per la tua email ti rispondiamo in 48 ore');
    }
}
