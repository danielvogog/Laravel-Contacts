<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class ContactsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $contacts = Contact::orderBy('id', 'DESC')->paginate(5);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $form_array = array(
            'action' => 'ContactsController@store',
            'method' => 'POST',
            'label' => 'Create'
        );
        return view('contacts.form', compact('form_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'first_name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:30',
            'number' => 'required|min:3|max:30',
        ]);

        $new_contact = new Contact();
        $new_contact->first_name = strval($request->input('first_name'));
        $new_contact->last_name = strval($request->input('last_name'));
        $new_contact->number = intval($request->input('number'));
        $new_contact->save();
        
        $notifications_type = $this->_get_notifications_type();
        if($notifications_type === 'sweetalert2') {
            Alert::success('Contact created successfully!');
            return redirect()->action('ContactsController@index');
        }
        return redirect()->action('ContactsController@index')->with('status', 'Contact created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {   
        $contact = Contact::findOrFail(intval($id));   
        $form_array = array(
            'action' => 'ContactsController@update',
            'method' => 'PUT',
            'label' => 'Update'
        );     
        
        return view('contacts.form', compact(
            'contact', 
            'form_array'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'first_name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:30',
            'number' => 'required|min:3|max:30',
        ]);

        $contact = Contact::findOrFail(intval($id));
        $contact->first_name = strval($request->input('first_name'));
        $contact->last_name = strval($request->input('last_name'));
        $contact->number = intval($request->input('number'));
        $contact->save();

        $notifications_type = $this->_get_notifications_type();
        if($notifications_type === 'sweetalert2') {
            Alert::success('Contact updated successfully!');
            return redirect()->action('ContactsController@index');
        }
        return redirect()->action('ContactsController@index')->with('status', 'Contact updated successfully!');
    }

    /**
     * Confirm remove the specified resource.
     *
     * @param int $id
     */    
    public function confirmDestroy($id) {
        $contact = Contact::findOrFail(intval($id));
        return view('contacts.confirmDestroy', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $contact = Contact::findOrFail(intval($id));
        $contact->delete();

        $notifications_type = $this->_get_notifications_type();
        if($notifications_type === 'sweetalert2') {
            Alert::success('Contact deleted successfully!');
            return redirect()->action('ContactsController@index');
        }
        return redirect()->action('ContactsController@index')->with('status', 'Contact deleted successfully!');
    }

    /**
     * 
     */
    public function settings_show() {
        $notifications_array = [
            'standard' => 'Standard',
            'sweetalert2' => 'Sweet Alert 2'
        ];
        $notifications_type = $this->_get_notifications_type();

        return view('contacts.settings', compact(
            'notifications_array', 
            'notifications_type'
        ));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function settings_store(Request $request) {
        $notifications_type = strval($request->input('notification'));
        $notifications_type_array = [
            'notifications_type' => $notifications_type
        ];
        $path = app_path() .'\Settings\settings.json';
        file_put_contents($path, json_encode($notifications_type_array));

        if($notifications_type === 'sweetalert2') {
            Alert::success('Notifications type saved successfully!');
            return redirect()->action('ContactsController@index');
        }
        return redirect()->action('ContactsController@index')->with('status', 'Notifications type saved successfully!');
    }

    /**
     * 
     */
    private function _get_notifications_type() {
        $path = app_path() .'\Settings\settings.json';
        if(file_exists($path)) {
            $notifications = json_decode(file_get_contents($path), true);
            $notifications_type = strval($notifications['notifications_type']);
            return $notifications_type;
        }
        return false;
    }
}
