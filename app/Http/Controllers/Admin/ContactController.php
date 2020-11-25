<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all(); 
        return view('admin.contact.index',compact('contacts'));
    }

    public function create(){
        return view('admin.contact.create');
    }

    public function store(StoreContactRequest $request,Contact $contact){
        $contact = Contact::create($request->all());
        return redirect()->route('admin.contact.index')->with('status', 'Contact Created Successfullty!');
    }

    public function destroy(Contact $contact){
        $contact->delete();
        return back()->with('status', 'Contact Deleted Successfullty!');;
    }
}
