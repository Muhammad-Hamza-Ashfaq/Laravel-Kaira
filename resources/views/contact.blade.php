@extends('layouts.app')

@section('title', 'contact us')



<section class="newsletter bg-light" style="background: url(images/pattern-bg.png) no-repeat;">
  @section('content')
{{-- start of Contact us section --}}
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
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 py-5 my-5">
          <div class="subscribe-header text-center pb-3">
            <h3 class="section-title text-uppercase">Contact Us</h3>
          </div>
          <form id="form" action="{{ route('home.contact') }}" class="d-flex flex-wrap gap-2" method="POST">
            @csrf
            <input type="text" name="email" value="{{ old('email') }}" placeholder="Your Email Addresss" class="form-control form-control-lg">
            <textarea placeholder="Type Your Message!" rows="5" cols="30" class="form-control form-control-lg" name='message' id="message">{{ old('message') }}</textarea>
            <button class="btn btn-dark btn-lg text-uppercase w-100" type="submit">Send</button>
          </form>
        </div>
      </div>
    </div>
  </section>
{{-- end of Contact Us section --}}
@endsection
