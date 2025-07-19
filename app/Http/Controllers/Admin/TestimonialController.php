<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $allTestimonials = Testimonial::orderBy('created_at')->paginate('9');
        return view('admin.testimonials.index', compact('allTestimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        // dd("Hello From Controller");
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:1000',
            'author_name' => 'required|string|max:350',
        ]);

        // dd($validated);
        $testimonial = new Testimonial();
        $testimonial->title = $validated['title'];
        $testimonial->text = $validated['text'];
        $testimonial->author_name = $validated['author_name'];
        $testimonial->save();


        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial Has Been Created!');

    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));

    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:1000',
            'author_name' => 'required|string|max:350',
        ]);

        // dd($validated);
        $testimonial->title = $validated['title'];
        $testimonial->text = $validated['text'];
        $testimonial->author_name = $validated['author_name'];
        $testimonial->save();


        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial Has Been Updated!');

    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);        
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', "Testimonial Deleted!");
    }
}
