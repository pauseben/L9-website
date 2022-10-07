<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactUsFormController extends Controller
{

    /**
     * It returns a view called `admin.contact-form-list` and passes it a variable called `contacts`
     * which is the result of the `Contact::All()` function
     * 
     * @return The view admin.contact-form-list is being returned.
     */
    public function listContacts(){
        $contacts = Contact::All();
        return view('admin.contact-form-list')->with(compact('contacts'));
    }

    /**
     * The function validates the form data, creates a new record in the database, and then redirects
     * the user back to the previous page with a success message
     * 
     * @param Request request The request object.
     * 
     * @return The view is being returned.
     */
    public function createForm(Request $request) {
        return view('pages.contact');
      }
      // Store Contact Form data
      public function ContactUsForm(Request $request) {
          // Form validation
          $this->validate($request, [
              'name' => 'required',
              'email' => 'required|email',
              'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
              'subject'=>'required',
              'message' => 'required'
           ],[
            'name.required' => 'Név mező kötelező',
            'email.required' => 'E-mail mező kötelező',
            'phone.required' => 'Telefonszám mező kötelező',
            'subject.required' => 'Cím mező kötelező',
            'message.required' => 'Üzenet mező kötelező',
        ]);
          //  Store data in database
          Contact::create($request->all());
          // 
          return back()->with('success', 'Üzenetét megkaptuk. Hamarosan felvesszük Önnel a kapcsolatot.');
      }
}
