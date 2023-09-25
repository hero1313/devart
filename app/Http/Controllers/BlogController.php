<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return view('admin.components.blogs', compact(['blogs']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->name = $request->name;
        $blog->text = $request->text;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $blog->image = "$filename";
        }
        $blog->update();
        $blog->save();
        return back();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->name = $request->name;
        $blog->text = $request->text;
        if ($request->hasfile('image')) {
            $destination = 'assets/image/' . $blog->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('assets/image/', $filename);
            $blog->image = "$filename";
        }
        $blog->update();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return back();
    }



    // website

    public function websiteIndex()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return view('website.components.blogs', compact(['blogs']));
    }
    public function websiteShow($id)
    {
        $blog = Blog::find($id);

        return view('website.components.blog', compact(['blog']));
    }
}
