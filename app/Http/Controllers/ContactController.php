<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Contact;


class ContactController extends Controller
{
 public function index()

 {
       $contacts = Contact::get();

    //    foreach ($contacts as $contact) {
    //       echo $contact->name.'<br>';
    //    }

     return view('contact.index', compact('contacts'));
 } 


  public function store()

  {
    Contact::create([
        'name' => 'David123'
    ]);

      return back();
  }
  

}
 