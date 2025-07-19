@extends('layouts.admin')

@section('title', 'Admin - Create Testimonial')

@section('content')

<div class="container">
    <h3 class="text-center">Create Testimonial</h3>
    <hr>
     <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class='col-md-6 mb-3'>
                <label for='title' class="form-label">Title</label>
                <input type='text' name='title' value="{{ old('title') }}" class="form-control" placeholder="Enter Title" required >
            </div>
            <div class='col-md-6 mb-3'>
                <label for='author_name' class="form-label">Author Name</label>
                <input type='text' name='author_name' value="{{ old('author_name') }}" class="form-control" placeholder="Enter Author Name" required>                
            </div>
        </div>
             <div class="row">
            <div class='col-md-12 mb-3'>
                <label for='text' class="form-label">Text</label>
                <textarea name="text" class="form-control" required placeholder="Enter Testimonial Text">{{ old('text') }}</textarea>
            </div>


        
        </div>
    
            <div class="text-end">
                <button type="submit" class="btn btn-success">Create Testimonial</button>
            </div>
        </form>
</div>
@endsection