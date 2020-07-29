<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('updated_at', 'desc')->paginate(5);
        return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25',
            'number' => 'required|min:3|max:25',
        ]);

        $contact = new Contact();
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->number = $request->input('number');
        $contact->save();

        return redirect('/')->with('status', 'Contact created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25',
            'number' => 'required|min:3|max:25',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->number = $request->input('number');
        $contact->save();

        return redirect('/')->with('status', 'Contact updated successfully!');
    }

    /**
     * Confirm remove the specified resource.
     *
     * @param int $id
     */    
    public function confirmDestroy($id) {
        $contact = Contact::findOrFail($id);
        return view('contacts.confirmDestroy', ['contact' => $contact]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect('/')->with('status', 'Contact deleted successfully!');
    }
}
