<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Flor;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ApartmentController extends Controller
{
      // ------------------------------admin---------------------------------

      public function index($id)
      {
        $flor = Flor::find($id);
        $apartments = Apartment::where('flor_id', $flor->id)->get();

        return view('admin.components.apartments', compact(['flor', 'apartments']));
      }

      public function store(Request $request, $id)
      {
        $flor = Flor::find($id);

        $apartments = new Apartment;
        $apartments->project_id = $flor->project_id;
        $apartments->corp_number = $flor->corp_number;
        $apartments->flor_id = $flor->id;
        $apartments->flor = $flor->flor_number;
        $apartments->number = $request->number;
        $apartments->code = $request->code;
        $apartments->price = $request->price;
        $apartments->space = $request->space;
        $apartments->inside_space = $request->inside_space;
        $apartments->balcony_space = $request->balcony_space;
        $apartments->badrooms = $request->badrooms;
        $apartments->status = -1;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $apartments->image = "$filename";
        }
        if ($request->hasfile('image_d')) {

            $file = $request->file('image_d');
            $extention = $file->getClientOriginalExtension();
            $filename = time() .'d'. '.' . $extention;
            $file->move('assets/image/', $filename);
            $apartments->image_d = "$filename";

        }

        $apartments->save();

        return back();
      }

      public function update(Request $request, $id)
      {
        $apartment = Apartment::find($id);
        $apartment->number = $request->number;
        $apartment->code = $request->code;
        $apartment->price = $request->price;
        $apartment->space = $request->space;
        $apartment->inside_space = $request->inside_space;
        $apartment->balcony_space = $request->balcony_space;
        $apartment->badrooms = $request->badrooms;
        $apartment->status = $request->status;
        if ($request->hasfile('image')) {
            $destination = 'assets/image/' . $apartment->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $apartment->image = "$filename";
        }
        if ($request->hasfile('image_d')) {
            $destination = 'assets/image/' . $apartment->image_d;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            $file = $request->file('image_d');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $apartment->image_d = "$filename";
        }
        $apartment->update();

        return back();
      }

      public function destroy($id)
      {
        $apartment = Apartment::find($id);
        $apartment->delete();
        return back();
      }

      //------------------------------apartments table

      public function indexTable(Request $request)
      {
        $apartments = Apartment::all();
        $projects = Project::all();

        return view('admin.components.apartments-table', compact(['apartments','projects']));
      }

      public function storeTable(Request $request)
      {

        $apartments = new Apartment;
        $apartments->project_id = $request->project_id;
        $apartments->corp_number = $request->corp_number;
        $apartments->flor = $request->flor;
        $apartments->number = $request->number;
        $apartments->code = $request->code;
        $apartments->price = $request->price;
        $apartments->space = $request->space;
        $apartments->inside_space = $request->inside_space;
        $apartments->balcony_space = $request->balcony_space;
        $apartments->badrooms = $request->badrooms;
        $apartments->status = -1;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $apartments->image = "$filename";
        }
        if ($request->hasfile('image_d')) {
            $file = $request->file('image_d');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $apartments->image_d = "$filename";
        }

        $apartments->save();
        return back();
      }

      public function updateTable(Request $request, $id)
      {

        $apartment = Apartment::find($id);
        $apartment->project_id = $request->project_id;
        $apartment->corp_number = $request->corp_number;
        $apartment->flor = $request->flor;
        $apartment->number = $request->number;
        $apartment->code = $request->code;
        $apartment->price = $request->price;
        $apartment->space = $request->space;
        $apartment->inside_space = $request->inside_space;
        $apartment->balcony_space = $request->balcony_space;
        $apartment->badrooms = $request->badrooms;
        $apartment->status = $request->status;
        if ($request->hasfile('image')) {
            $destination = 'assets/image/' . $apartment->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $apartment->image = "$filename";
        }
        if ($request->hasfile('image_d')) {
            $destination = 'assets/image/' . $apartment->image_d;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            $file = $request->file('image_d');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $apartment->image_d = "$filename";
        }
        $apartment->update();

        return back();
      }


      // ------------------------------admin end---------------------------------


      // ------------------------------website---------------------------------


      public function websiteIndex(Request $request)
      {

      }


      public function websiteShowId(Request $request, $id)
      {
        $apartment = Apartment::find($id);
        $shareButtons=\Share::page(
            url('/apartment/id/' . $id),
            'here is the text',
        )->facebook()->telegram()->whatsapp();
        return view('website.components.apartment', compact(['apartment','shareButtons']));
      }

      public function websiteShowCode(Request $request, $code)
      {
        $apartment = Apartment::where('code', $code)->first();
        $shareButtons=\Share::page(
            url('/apartment/' . $code),
            'here is the text',
        )->facebook()->telegram()->whatsapp();
        if ($apartment) {
            return view('website.components.apartment', compact(['apartment','shareButtons']));
        } else {
            abort(404);
        }
        
      }

      // ------------------------------website end---------------------------------

}
