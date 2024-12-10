<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Void_;

class ContactController extends Controller
{
    public $userId;
    public $isAdmin;

    public function __construct()
    {
        $this->userId = Auth::id();
        $this->isAdmin = Auth::user()->is_admin;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $contacts = null;

            if ($this->isAdmin) {
                $contacts = Contact::query()->orderBy('id', 'desc')->withTrashed()->paginate(10);
            } else {
                $contacts = Contact::query()->where('user_id', $this->userId)->orderBy('id', 'desc')->paginate(10);
            }

            return view('contacts.index', [
                'contacts' => $contacts
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $contact = new Contact();
            $contact->user_id = $this->userId;


            return view('contacts.create', [
                'contact' => $contact,
                'action' => route('contacts.store'),
                'method' => 'POST'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        try {
            $data = $request->validated();

            $contact = Contact::create($data);

            $message = __('Contact Created Successfully') . ': ' . $contact->name . ' ' . $contact->surname;

            return to_route('contacts.index')->with('sessionMessage', $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        try {
            return view('contacts.show', [
                'contact' => $contact
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        try {
            return view('contacts.edit', [
                'contact' => $contact,
                'action' => route('contacts.update', $contact),
                'method' => 'PATCH'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        try {
            $data = $request->validated();

            $contact->update($data);

            $message = __('Contact Updated Successfully') . ': ' . $contact->name . ' ' . $contact->surname;

            return to_route('contacts.index')->with('sessionMessage', $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();

            $message = __('Contact Deleted Successfully') . ': ' . $contact->name . ' ' . $contact->surname;

            return to_route('contacts.index')->with('sessionMessage', $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function forceDelete($id)
    {
        try {
            $contact = Contact::withTrashed()->findOrFail($id);

            $contact->forceDelete();

            $message = __('Contact Deleted Permanently') . ': ' . $contact->name . ' ' . $contact->surname;

            return to_route('contacts.index')->with('sessionMessage', $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

        public function Restore($id){
            try {
                $contact = Contact::withTrashed()->findOrFail($id);

                $contact->restore();

                $message = __('Contact Restored Successfully') . ': ' . $contact->name . ' ' . $contact->surname;

                return to_route('contacts.index')->with('sessionMessage', $message);
            } catch (\Throwable $th) {
                throw $th;
            }
            
        }
}
