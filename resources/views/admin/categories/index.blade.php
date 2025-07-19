@extends('layouts.admin')

@section('title', 'Admin - Categories')

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
    <h3 class="text-center">All Categories</h3>  <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">Create Category</a>
        
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Is Active</th>
                <th scope="col">Is Featured</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category )
            <tr>
            {{-- <th scope="row">1</th> --}}
                <td>{{ $category['id'] }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->description }}</td>
                <td><img src="{{ asset('images/' . $category->image) }}" width="60" height='70' style="border-radius:16px;"></td>
                <td>{{ $category->is_active }}</td>
                <td>{{ $category->is_featured }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class='btn btn-sm btn-warning'>Edit</a> 
                    <form action={{ route('admin.categories.destroy', $category->id) }} method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
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
        {{$categories->withQueryString()->links('pagination::bootstrap-5') }}

      </div>
</div>
@endsection