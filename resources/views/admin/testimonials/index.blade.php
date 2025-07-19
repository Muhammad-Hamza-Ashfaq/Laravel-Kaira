@extends('layouts.admin')

@section('title', 'Admin - All Testimonials')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role='alert'>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">
    <h3 class="text-center">All Testimonials</h3>  
    <a href="{{ route('admin.testimonials.create') }}" class='btn btn-sm btn-success'>Add Testimonial</a> 
    <hr>
    {{-- <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">Create Category</a> --}}
        
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Text</th>
                <th scope="col">Author</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($allTestimonials as $testimonial )
            <tr>
            {{-- <th scope="row">1</th> --}}
                <td>{{ $testimonial['id'] }}</td>
                <td>{{ $testimonial->title }}</td>
                <td>{{ $testimonial->text }}</td>
                <td>{{ $testimonial->author_name }}</td>
                <td>{{ $testimonial->created_at->format('d M Y, h:i A') }}</td>
                {{-- <td><img src="{{ asset('images/' . $category->image) }}" width="60" height='70' style="border-radius:16px;"></td> --}}
                <td>
                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class='btn btn-sm btn-success'>Update</a> 
                    {{-- <a href="{{ route('admin.orders.edit', $testimonial->id) }}" class='btn btn-sm btn-danger mt-2'>Delete</a>  --}}
                    <form action={{ route('admin.testimonials.destroy', $testimonial->id) }} method="POST" onsubmit="return confirm('Are you sure you want to delete this Testimonial?');">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger mt-2">Delete</button>
                    </form>
                </td>
                
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
      <div class="d-flex justify-content-center mt-4">
        {{-- {{ $allProducts->withQueryString()->links() }} --}}
        {{$allTestimonials->withQueryString()->links('pagination::bootstrap-5') }}

      </div>
</div>
<hr>
@endsection