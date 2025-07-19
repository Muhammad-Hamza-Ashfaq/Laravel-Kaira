<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::orderBy('created_at');
        // $categories = Category::all();
        $categories = Category::orderBy('created_at')->paginate(7);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|regex:/^[a-z0-9\-]+$/|unique:categories,slug', 
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'is_active' => 'required|boolean',
            'is_featured' => 'required|boolean',
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category Has Been Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $category = Category::findOFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'slug' => 'required|string|regex:/^[a-z0-9]+\-$/', Rule::unique('categories')->ignore($category->id),
            'slug' =>  [
                          'required',
                            'string',
                            'regex:/^[a-z0-9\-]+$/', // corrected the regex too — now it allows multiple dashes and is more flexible
                            Rule::unique('categories')->ignore($category->id),
                        ],
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'is_active' => 'required|boolean',
            'is_featured' => 'required|boolean',
        ]);

        if ($request->hasFile('image'))
        {
            // deleting previous image
            $previousImagePath = public_path('images/'. $category->image);
            if (file_exists($previousImagePath))
            {
                unlink($previousImagePath);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName); // Save the image with the name $imageName
            $validated['image'] = $imageName;
        }
        
        else{
            $validated['image'] = $category->image;
        }
        
        // dd($validated);
        $category->update($validated);
        if (!$category->update($validated)) {
        return redirect()->back()->with('error', 'Failed to update category.');
            }
        return redirect()->route('admin.categories.index')->with('success', "Category Has Been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if($category->image && file_exists(public_path('images/'. $category->image)))
        {
            unlink(public_path('images/' . $category->image));
        }
        
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', "Category Deleted!");
    }
}
