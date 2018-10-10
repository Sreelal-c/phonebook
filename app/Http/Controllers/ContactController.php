<?php

namespace App\Http\Controllers;
use App\Contact;
use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		return view('addcontact');
	}

	public function store() {
		$this->validate(request(), [
			'name' => 'required',
			'phoneno' => 'required',
			'email' => 'sometimes  | nullable | unique:contacts',
		]);

		$contact = new Contact;

		$contact->name = request('name');
		$contact->nick_name = request('nickname');
		//$contact->phone = request('phone');
		//$contact->alt_phone = request('phonealt');
		$contact->email = request('email');
		$contact->address = request('address');
		$contact->comments = request('comments');
		$contact->designation = request('job');
		$contact->facebook = request('facebook');
		$contact->is_friend = request('known');
		$contact->save();
		$id = $contact->id;

		$phone = request('phoneno');

		for ($i = 0; $i < count($phone); $i++) {
			$p = new Phone();
			$p->contact_id = $id;
			$p->phone = $phone[$i];
			$p->save();
		}
		return redirect()->action('ViewContact@index', ['id' => $id])->with('status', 'Contact Added!');
	}

	public function edit($id) {
		$contact = Contact::find($id);
		return view('editcontact', ['contact' => $contact]);
	}

	public function update() {
		$id = request('id');
		$contact = Contact::find($id);
		$contact->name = request('name');
		$contact->nick_name = request('nickname');
		$contact->email = request('email');
		$contact->address = request('address');
		$contact->comments = request('comments');
		$contact->designation = request('job');
		$contact->facebook = request('facebook');
		$contact->is_friend = request('known');
		$contact->save();
		$id = $contact->id;

		$phone = request('phoneno');
		for ($i = 0; $i < count($phone); $i++) {
			$p = new Phone();
			$p->contact_id = $id;
			$p->phone = $phone[$i];
			$p->save();
		}
		return redirect()->action('ViewContact@index', ['id' => $id])->with('status', 'Contact updated successfully!');
	}

	public function uploadImage(Request $request) {
		$id = request('id');
		$file = $request->file('image');
		$contact = Contact::find($id);
		$filename = $contact->name . '-' . $id . '.jpg';
		if ($file) {
			Storage::disk('local')->put($filename, File::get($file));
		}

		return redirect()->action('ViewContact@index', ['id' => $id])->with('status', 'Contact Photo Updated Successfully!');

	}

	public function getContactImage($filename) {
		$file = Storage::disk('local')->get($filename);
		return new Response($file, 200);
	}
}
