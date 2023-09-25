<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{

    // ------------------------------admin---------------------------------
    public function loader()
    {
        return view('admin.components.loader');
    }
    public function index()
    {

        $projects = Project::orderBy('created_at', 'desc')->get();

        return view('admin.components.projects', compact(['projects']));
    }

    public function store(Request $request)
    {
        $project = new Project;
        $project->name = $request->name;
        $project->address = $request->address;
        $project->space = $request->space;
        $project->recreation = $request->recreation;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $project->image = "$filename";
        }

        $project->image_d = $request->image_d;
        $project->description = $request->description;

        $project->save();


        return back();
    }

    public function show(Request $request, $id)
    {
        $corp = Corp::find($id);
        return view('admin.components.corp', compact(['corps']));
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->name = $request->name;
        $project->address = $request->address;
        $project->space = $request->space;
        $project->recreation = $request->recreation;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        if ($request->hasfile('image')) {
            $destination = 'assets/image/' . $project->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $project->image = "$filename";
        }
        $project->image_d = $request->image_d;
        $project->description = $request->description;
        $project->update();

        return back();
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return back();
    }

    // ------------------------------admin end---------------------------------


    // ------------------------------website---------------------------------


    public function websiteIndex(Request $request)
    {
        if($request->status){
            $projects = Project::where('status', $request->status)->orderBy('created_at', 'desc')->get();
        }
        else{
            $projects = Project::orderBy('created_at', 'desc')->get();
        }

        return view('website.components.projects', compact(['projects']));
    }

    public function websiteShow(Request $request, $id)
    {
        $project = Project::find($id);
        $apartments = Apartment::where('project_id', $id);
        $time = Carbon::today()->diff($project->end_date, false);
        $deadline =(  $time->y . ' წელი ' . $time->m . ' თვე ' . $time->d . ' დღე' );
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

        return view('website.components.project', compact(['project', 'apartments', 'deadline']));
    }

    // ------------------------------website end---------------------------------

}
