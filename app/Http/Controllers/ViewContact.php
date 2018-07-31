<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ViewContact extends Controller
{
    public function index($id){
        $contact = Contact::find($id);
        return view('viewcontact', ['contact' => $contact]);
    }
}
