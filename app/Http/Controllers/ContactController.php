<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactFormMarkdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function form()
    {
        return view('guests.contacts');
    }

    public function storeAndSend(Request $request)
    {
        // Valida i dati
        //ddd($request->all());
        $validatedData = $request->validate([
            "full_name" => "required",
            "email" => "required |email",
            "message" => "required",
        ]);

        #salva nel database
        $contact = Contact::create($validatedData);
        //ddd($validatedData);
        //ddd($contact);
        #Visualizza solo senza inviare
        //return (new ContactFormMarkdown($contact))->render();

        #Invia la mail
        Mail::to('admin@test.com')->send(new ContactFormMarkdown($contact));
        return redirect()
            ->back()
            ->with(
                'message',
                'Success! Grazie per la tua email ti rispondiamo in 48 ore'
            );
    }
}
