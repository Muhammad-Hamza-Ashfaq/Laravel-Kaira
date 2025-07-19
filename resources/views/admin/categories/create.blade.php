@extends('layouts.admin')

@section('title', 'Admin - Create Category')

@section('content')

<div class="container">
    <h3 class="text-center">Create Category</h3>
    <hr>
     <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class='col-md-6 mb-3'>
                <label for='name' class="form-label">Name</label>
                <input type='text' name='name' value="{{ old('name') }}" class="form-control" placeholder="Enter Category Name" required >
            </div>
            <div class='col-md-6 mb-3'>
                <label for='slug' class="form-label">Slug</label>
                <input type='text' name='slug' value="{{ old('slug') }}" class="form-control" placeholder="Give Category a Slug" required>                
            </div>
        </div>

         <div class="row">
            <div class='col-md-12 mb-3'>
                <label for='description' class="form-label">Description</label>
                <textarea name="description" class="form-control" required placeholder="Give Precise Description">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="row">
            <div>
                <label for='image' class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
        </div>
       

        <div class="row">
            {{-- is active --}}
            <div class='col-md-6 mb-3'>
                <label for='is_active' class="form-label">Is Active</label>
                <select name="is_active" class="form-select" required>
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>True</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>False</option>
                </select>
            </div>
            {{-- is featured --}}
            <div class='col-md-6 mb-3'>
                <label for='is_featured' class="form-label">Is Featured</label>
                <select name="is_featured" class="form-select" required>
                    <option value="1" {{ old('is_featured') == '1' ? 'selected' : '' }}>True</option>
                    <option value="0" {{ old('is_featured') == '0' ? 'selected' : '' }}>False</option>
                </select>
            </div>
        </div>
    
            <div class="text-end">
                <button type="submit" class="btn btn-success">Create Category</button>
            </div>
        </form>
</div>
@endsection