<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Slide;
use App\Models\Partner;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::orderBy('id', 'desc')->take(3)->get();
        $slides = Slide::orderBy('id', 'desc')->get();
        $partners = Partner::orderBy('id', 'desc')->get();



        return view('website.components.main', compact(['blogs', 'slides','partners']));

    }
    public function about(Request $request)
    {

        return view('website.components.about');

    }
    public function contact(Request $request)
    {

        return view('website.components.contact');

    }
    public function indexContact(Request $request)
    {
        $contacts = Contact::orderBy('id', 'desc')->get();

        return view('admin.components.contacts', compact(['contacts']));

    }
    public function storeContact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->number = $request->number;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->save();
        return redirect()->back();

    }
}
