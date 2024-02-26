<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Organisation;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contacts::all();
        return view('contact.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisations = Organisation::all();
        return view('contact.create', ['organisations'=> $organisations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'firstname'=> 'required',
            'lastname'=>'required',
            'email'=> 'required',
            'phone'=> 'required',
            'job_title'=>'required',
            'organisation_id'=> 'required',
        ]);

        //Upload and save the image
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $request->image = $name;

        //use the new contact to create a new organization
        $contact = new Contacts();
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->job_title = $request->job_title;
        $contact->organisation_id = $request->organisation_id;
        $contact->image = $request->image;
        $contact->save();
        //redirect to the index page
        return redirect()->route('contact.index') ->with('success','Data has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(contacts $contact)
    {
        $contact = Contacts::findOrFail($contact);
        return view('contact.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contacts $contact)
    {
        $contact = Contacts::find($contact);
        return view('contact.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contacts $contact)
    {
       $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'job_title' => 'required',
            'organisation_id' => 'required',
       ]);
        // fetch the contact
        $contact = Contacts::findOrFail($contact->id);

        // update the contact
        $contact->update($request->all());

        // redirect back to the contact's details page
        return redirect()->route('contact.show', $contact)->with('success', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacts $contact)
    {
        $contact->delete();
        return redirect()->route('Contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
