<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::orderBy('updated_at')->paginate(6);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0', 
            'description' => 'required|string|max:1000',
            'discounted_price' => 'nullable|numeric|min:0|lt:price',  
            'season' => 'required|string|in:summer,winter',  
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'stock_quantity' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'is_new_arrival' => 'required|boolean',
            'is_best_selling' => 'required|boolean',
            'is_recommended' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        // dd($validated);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product Has Been Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0', 
            'description' => 'required|string|max:1000',
            'discounted_price' => 'nullable|numeric|min:0|lt:price',  
            'season' => 'required|string|in:summer,winter',  
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'stock_quantity' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'is_new_arrival' => 'required|boolean',
            'is_best_selling' => 'required|boolean',
            'is_recommended' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);


        if ($request->hasFile('image'))
        {
            // deleting previous image
            $previousImagePath = public_path('images/'. $product->image);
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
            $validated['image'] = $product->image;
        }

        $product->update($validated);
        if (!$product->update($validated)) {
        return redirect()->back()->with('error', 'Failed to update category.');
            }
        return redirect()->route('admin.products.index')->with('success', "Product Has Been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if($product->image && file_exists(public_path('images/'. $product->image)))
        {
            unlink(public_path('images/' . $product->image));
        }
        
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', "Product Deleted!");
    }
    
}
