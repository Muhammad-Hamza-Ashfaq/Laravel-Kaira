@extends('layouts.admin')

@section('title', 'Admin - Edit Product')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <h3 class="text-center">Update Product</h3>
    <hr>
     <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row">
            <div class='col-md-6 mb-3'>
                <label for='name' class="form-label">Name</label>
                <input type='text' name='name' value="{{ old('name', $product->name) }}" class="form-control" placeholder="Enter Category Name" required >
            </div>
            <div class='col-md-6 mb-3'>
                <label for='price' class="form-label">Price</label>
                <input type='text' name='price' value="{{ old('price', $product->price) }}" class="form-control" placeholder="Enter Price" required>                
            </div>
        </div>

         <div class="row">
            <div class='col-md-12 mb-3'>
                <label for='description' class="form-label">Description</label>
                <textarea name="description" class="form-control" required placeholder="Give Precise Description">{{ old('description', $product->description) }}</textarea>
            </div>
        </div>

        {{-- Discounted Price --}}
        <div class="row">
            <div class='col-md-12 mb-3'>
                <label for='discounted_price' class="form-label">Discounted Price</label>
                <input type='text' name='discounted_price' value="{{ old('discounted_price', $product->discounted_price) }}" class="form-control" placeholder="Enter Discounted Price" required >
            </div>
        </div>    
        
        @if ($product->image)
            <img src="{{ asset('images/' . $product->image) }}" width="60" height='70' style="border-radius:16px;">
        @endif

        <div class="row">
            <div>
                <label for='image' class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
        </div>


          <div class="row mt-2">
            {{-- stock --}}
            <div class='col-md-6 mb-3'>
                <label for='stock_quantity' class="form-label">Stock Quantity</label>
                <input type='text' name='stock_quantity' value="{{ old('stock_quantity', $product->stock_quantity) }}" class="form-control" placeholder="Enter Stock Quantity" required >
            </div>
            {{-- season--}}
            <div class='col-md-6 mb-3'>
                <label for='season' class="form-label">Season</label>
                <select name="season" class="form-select" required>
                    <option value="winter" {{ old('season', $product->season) == 'winter' ? 'selected' : '' }}>Winter</option>
                    <option value="summer" {{ old('season', $product->season) == 'summer' ? 'selected' : '' }}>Summer</option>
                </select>
            </div>
        </div>
       

        <div class="row">
            {{-- is active --}}
            <div class='col-md-6 mb-3'>
                <label for='is_active' class="form-label">Is Active</label>
                <select name="is_active" class="form-select" required>
                    <option value="1" {{ old('is_active', $product->is_active) == '1' ? 'selected' : '' }}>True</option>
                    <option value="0" {{ old('is_active', $product->is_active) == '0' ? 'selected' : '' }}>False</option>
                </select>
            </div>
            {{-- is featured --}}
            <div class='col-md-6 mb-3'>
                <label for='is_featured' class="form-label">Is Featured</label>
                <select name="is_featured" class="form-select" required>
                    <option value="1" {{ old('is_featured', $product->is_featured) == '1' ? 'selected' : '' }}>True</option>
                    <option value="0" {{ old('is_featured', $product->is_featured) == '0' ? 'selected' : '' }}>False</option>
                </select>
            </div>
        </div>

        <div class="row">
            {{-- is new arrival --}}
            <div class='col-md-6 mb-3'>
                <label for='is_new_arrival' class="form-label">Is New Arrival</label>
                <select name="is_new_arrival" class="form-select" required>
                    <option value="1" {{ old('is_new_arrival', $product->is_new_arrival) == '1' ? 'selected' : '' }}>True</option>
                    <option value="0" {{ old('is_new_arrival', $product->is_new_arrival) == '0' ? 'selected' : '' }}>False</option>
                </select>
            </div>
            {{-- is best selling --}}
            <div class='col-md-6 mb-3'>
                <label for='is_best_selling' class="form-label">Is Best Selling</label>
                <select name="is_best_selling" class="form-select" required>
                    <option value="1" {{ old('is_best_selling', $product->is_best_selling) == '1' ? 'selected' : '' }}>True</option>
                    <option value="0" {{ old('is_best_selling', $product->is_best_selling) == '0' ? 'selected' : '' }}>False</option>
                </select>
            </div>
        </div>


        <div class="row">
            {{-- is recommended --}}
            <div class='col-md-6 mb-3'>
                <label for='is_recommended' class="form-label">is Recommended</label>
                <select name="is_recommended" class="form-select" required>
                    <option value="1" {{ old('is_recommended', $product->is_recommended) == '1' ? 'selected' : '' }}>True</option>
                    <option value="0" {{ old('is_recommended', $product->is_recommended) == '0' ? 'selected' : '' }}>False</option>
                </select>
            </div>
            {{-- category --}}
            <div class='col-md-6 mb-3'>
                <label for='category' class="form-label">Category</label>
                <select name="category_id" class="form-select" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
        
                </select>
            </div>
        </div>

    
            <div class="text-end">
                <button type="submit" class="btn btn-success">Update Product</button>
            </div>
        </form>
</div>
@endsection