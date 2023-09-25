<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Corp;
use App\Models\Flor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class FlorController extends Controller
{
    // ------------------------------admin---------------------------------

    public function index($id)
    {
        $corp = Corp::find($id);
        $flors = Flor::where('corp_number', $corp->number)->get();

        return view('admin.components.flors', compact(['corp', 'flors']));
    }

    public function store(Request $request, $id)
    {
        $corp = Corp::find($id);

        $flor = new Flor;
        $flor->project_id = $corp->project_id;
        $flor->corp_number = $corp->number;
        $flor->flor_number = $request->flor_number;
        $flor->space = $request->space;
        $flor->code = $request->code;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $flor->image = "$filename";
        }
        $flor->image_d = $request->image_d;
        $flor->save();

        return back();
    }

    public function show(Request $request, $id)
    {
        $corp = Corp::find($id);
        return view('admin.components.corp', compact(['corps']));
    }

    public function update(Request $request, $id)
    {

        $flor = Flor::find($id);
        $flor->flor_number = $request->flor_number;
        $flor->space = $request->space;
        $flor->code = $request->code;
        if ($request->hasfile('image')) {
            $destination = 'assets/image/' . $flor->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $flor->image = "$filename";
        }
        $flor->image_d = $request->image_d;
        $flor->update();

        return back();
    }

    public function destroy($id)
    {
        $flor = Flor::find($id);
        $flor->delete();
        return back();
    }
    // ------------------------------admin end---------------------------------


    // ------------------------------website---------------------------------

    public function websiteShow(Request $request, $code)
    {
        $flor = Flor::where('code', $code)->first();

        if ($flor) {
            $apartments = Apartment::where('flor_id', $flor->id);
            $apartments = Apartment::where('project_id', $flor->project_id)->where('corp_number', $flor->corp_number)->where('flor_id', $flor->id);


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
                $apartments->where('price', '>', $minPrice);
            }
            if ($maxPrice) {
                $apartments->where('price', '<', $maxPrice);
            }
            if ($minFlor) {
                $apartments->where('flor', '>', $minFlor);
            }
            if ($maxFlor) {
                $apartments->where('flor', '<', $maxFlor);
            }
            if ($minSpace) {
                $apartments->where('space', '>', $minSpace);
            }
            if ($maxSpace) {
                $apartments->where('space', '<', $maxSpace);
            }
            if ($minBadroom) {
                $apartments->where('badrooms', '>', $minBadroom);
            }
            if ($maxBadroom) {
                $apartments->where('badrooms', '<', $maxBadroom);
            }
            if ($number) {
                $apartments->where('number', '=', $number);
            }
            $apartments = $apartments->orderBy('created_at', 'desc')->get();
        } else {
            abort(404);
        }

        return view('website.components.flor', compact(['flor', 'apartments']));
    }

    // ------------------------------website end---------------------------------

}
