<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Phone;
use Illuminate\Http\Request;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$contact = Contact::paginate(5);
		return view('home', ['contact' => $contact]);
	}

	public function search(Request $request) {

		if ($request->ajax()) {

			$output = '
            <h3>Search Results</h3><hr>
            <table class="table table-striped">
            <thead class="thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
            </thead>';

			/*
				           example of and condition in query builder
				           $contacts=DB::table('contacts')->where([
				                ['name','LIKE','%'.$request->search."%"],
				                ['phone','LIKE','%'.$request->search."%"]
				                ])->get();
			*/
			// or condition
			$searchString = $request->search;
			$contacts = Contact::whereHas('phone', function ($query) use ($searchString) {
				$query->where('name', 'like', '%' . $searchString . '%');
			})->get();

			$phone = Contact::whereHas('phone', function ($query) use ($searchString) {
				$query->where('phone', 'LIKE', '%' . $searchString . '%');
			})->get();

			$contacts = $contacts->merge($phone);

			// $contacts=DB::table('contacts')->where('name', 'LIKE','%'.$request->search.'%')
			// ->orwhere('phone', 'LIKE','%'.$request->search.'%')->get();
			//count of total results
			//$count = DB::table('contacts')->where('name','LIKE','%'.$request->search."%")->count();
			$count = $contacts->count();
			if ($contacts) {
				if ($count > 0) {
					$i = 1;
					foreach ($contacts as $key => $contact) {

						$output .= '<tr>' .
						'<td>' . $i . '</td>' .
						'<td>' . $contact->name . '</td>' .
							'<td>';
						foreach ($contact->phone as $p) {
							$output .= $p->phone . '&nbsp';
						}

						$output .= '&nbsp' .
						'</td>' .
						'<td>' . $contact->address . '</td>' .
						'<td>
                	<a href="/view-contact/' . $contact->id . '" class="btn btn-sm btn-primary tooltips"  data-toggle="tooltip" title="" data-original-title="Edit">
                    <i class="ion-eye"></i>
                	</a>
                	&nbsp;
                    <a href="/edit-contact/' . $contact->id . '" class="btn btn-sm btn-warning tooltips"  data-toggle="tooltip" title="" data-original-title="Edit">
                    <i class="ion-edit"></i>
                	</a>
                	&nbsp;
                	<a href="#" class="btn btn-sm btn-danger tooltips"  data-toggle="tooltip" title="" data-original-title="Delete">
                    <i class="ion-trash-a"></i>
                	</a>
                </td>' .
							'</tr>';
						$i++;
					}
					$output .= "</table>";
					return Response($output);
				} else {
					$output = "<tr><td colspan='6'>No Matching Contact Found</td> </td>";
					return Response($output);
				}
			}

		}

	}
}
