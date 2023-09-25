<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Corp;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CorpController extends Controller
{
   // ------------------------------admin---------------------------------

   public function index($id)
   {
    $corps = Corp::where('project_id',$id)->get();
    $project = Project::find($id);

    return view('admin.components.corps', compact(['corps','project']));

   }

   public function store(Request $request, $id)
   {
    $corps = new Corp;
    $corps->project_id = $id;
    $corps->number = $request->number;
    $corps->code = $request->code;
    $corps->space = $request->space;
    $corps->flors = $request->flors;
    $corps->start_date = $request->start_date;
    $corps->end_date = $request->end_date;
    if ($request->hasfile('image')) {
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('assets/image/', $filename);
        $corps->image = "$filename";
    }
    $corps->image_d = $request->image_d;
    $corps->save();
    return back();
   }

   public function show(Request $request, $id)
   {
    $corp = Corp::find($id);
    return view('admin.components.corp', compact(['corps']));
    }

   public function update(Request $request, $id)
   {

    $corp = Corp::find($id);
    $corp->number = $request->number;
    $corp->code = $request->code;
    $corp->space = $request->space;
    $corp->flors = $request->flors;
    $corp->start_date = $request->start_date;
    $corp->end_date = $request->end_date;
    if ($request->hasfile('image')) {
        $destination = 'assets/image/' . $corp->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('assets/image/', $filename);
        $corp->image = "$filename";
    }
    $corp->image_d = $request->image_d;
    $corp->update();

    return back();

   }

   public function destroy($id)
   {
    $corp = Corp::find($id);
    $corp->delete();
    return back();
   }

   // ------------------------------admin end---------------------------------


   // ------------------------------website---------------------------------

   public function websiteShow(Request $request, $code)
   {

        $corp = Corp::where('code', $code)->first();
        if($corp){
            $apartments = Apartment::where('project_id', $corp->project_id)->where('corp_number', $corp->number);

            $minPrice = $request->min_price;
            $maxPrice = $request->max_price;
            $minFlor = $request->min_flor;
            $maxFlor = $request->max_flor;
            $minSpace = $request->min_space;
            $maxSpace = $request->max_space;
            $minBadroom = $request->min_badroom;
            $maxBadroom = $request->max_badroom;
            $number = $request->number;


            if ($minPrice) {
                $apartments->where('price','>', $minPrice);
            }
            if ($maxPrice) {
                $apartments->where('price','<', $maxPrice);
            }
            if ($minFlor) {
                $apartments->where('flor','>', $minFlor);
            }
            if ($maxFlor) {
                $apartments->where('flor','<', $maxFlor);
            }
            if ($minSpace) {
                $apartments->where('space','>', $minSpace);
            }
            if ($maxSpace) {
                $apartments->where('space','<', $maxSpace);
            }
            if ($minBadroom) {
                $apartments->where('badrooms','>', $minBadroom);
            }
            if ($maxBadroom) {
                $apartments->where('badrooms','<', $maxBadroom);
            }
            if ($number) {
                $apartments->where('number','=', $number);
            }
            $apartments = $apartments->orderBy('created_at', 'desc')->get();
        }
        else{
            abort(404);
        }

        return view('website.components.corp', compact(['corp', 'apartments']));

   }

   // ------------------------------website end---------------------------------

}
