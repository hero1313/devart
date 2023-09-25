<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::orderBy('created_at', 'desc')->get();

        return view('admin.components.slides', compact(['slides']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slide = new Slide;
        $slide->text = $request->text;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $slide->image = "$filename";
        }
        $slide->save();
        return back();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slide = Slide::find($id);
        $slide->text = $request->text;
        if ($request->hasfile('image')) {
            $destination = 'assets/image/' . $slide->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $slide->image = "$filename";
        }
        $slide->update();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return back();
    }
}
