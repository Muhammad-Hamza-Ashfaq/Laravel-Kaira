@extends('layouts.app')

@section('title', 'Home Page')


@section('title', 'Kaira Homepage')

@section('content')
{{-- Start of Content -- comment by hamza --}}
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
{{-- Start of New Collections Slider -- comment by Hamza --}}
<section id="billboard" class="bg-light py-5">
    <div class="container">
      <div class="row justify-content-center">
        <h1 class="section-title text-center mt-4" data-aos="fade-up">New Collections</h1>
        <div class="col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptas ut dolorum consequuntur, adipisci
            repellat! Eveniet commodi voluptatem voluptate, eum minima, in suscipit explicabo voluptatibus harum,
            quibusdam ex repellat eaque!</p>
        </div>
      </div>
      <div class="row">
          <div class="swiper main-swiper py-4" data-aos="fade-up" data-aos-delay="600">
              <div class="swiper-wrapper d-flex border-animation-left">
                @foreach ($newArrivals as $newArrival)
                    <div class="swiper-slide">
                        <div class="banner-item image-zoom-effect">
                            <div class="image-holder">
                                <a href="{{ route('home.productShow', $newArrival->id) }}">
                                    <img src="{{ asset('images/' . $newArrival->image) }}" alt="{{ $newArrival->name }}" class="img-fluid">
                                </a>
                            </div>
                            <div class="banner-content py-4">
                                <h5 class="element-title text-uppercase">
                                <a href="index.html" class="item-anchor">{{ $newArrival->name }}</a>
                                </h5>
                                <p>{{ $newArrival->description }}</p>
                                <div class="btn-left">
                                    <a href="{{ route('home.productShow' , $newArrival->id) }}" class="btn-link fs-6 text-uppercase item-anchor text-decoration-none">Discover Now</a>
                                </div>
                            </div>
                        </div>
                    </div>    
                @endforeach
              </div>
          </div>
        </div>

        <div>    
          <div class="swiper-pagination"></div>
        </div>
        <div class="icon-arrow icon-arrow-left">
            <svg width="50" height="50" viewBox="0 0 24 24">
                <use xlink:href="#arrow-left"></use>
            </svg>
        </div>
        <div class="icon-arrow icon-arrow-right">
            <svg width="50" height="50" viewBox="0 0 24 24">
                <use xlink:href="#arrow-right"></use>
            </svg>
        </div>
      </div>
    </div>
  </section>

  {{-- end of New Collections Slider --comment by hamza --}}

  {{-- start of book an appointment section -- comment by Hamza --}}
  {{--  --}}
  {{-- end of Follow Us on Instagram Section --}}
{{-- End of Content --}}


{{-- @endsection --}}

{{-- start of book an appointment section -- comment by Hamza --}}
  <section class="features py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="0">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24">
              <use xlink:href="#calendar"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">Book An Appointment</h4>
            <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
          </div>
        </div>
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="300">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24">
              <use xlink:href="#shopping-bag"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">Pick up in store</h4>
            <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
          </div>
        </div>
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="600">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24">
              <use xlink:href="#gift"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">Special packaging</h4>
            <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
          </div>
        </div>
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="900">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24">
              <use xlink:href="#arrow-cycle"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">free global returns</h4>
            <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="categories overflow-hidden">
    <div class="container">
      <div class="open-up" data-aos="zoom-out">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="cat-item image-zoom-effect">
                        <div class="image-holder">
                            <a href="{{ route('home.shopByCategory', $category->slug) }}">
                                <img src="{{asset('images/' . $category->image)}}" alt="{{ $category->name }}" class="product-image img-fluid">
                            </a>
                        </div>
                        <div class="category-content">
                            <div class="product-button">
                                <a href="index.html" class="btn btn-common text-uppercase">{{ $category->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </section>
 {{-- end of shop for men pics section --}}


 {{-- Start of Our New Arrivals Slider --}}
  <section id="new-arrival" class="new-arrival product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
        <h4 class="text-uppercase">Our New Arrivals</h4>
        <a href="{{ route('home.shop') }}" class="btn-link">View All Products</a>
      </div>
      <div class="swiper product-swiper open-up" data-aos="zoom-out">
        <div class="swiper-wrapper d-flex">
          @foreach ($newArrivals as $newArrival)
            <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder position-relative">
                <a href="{{ route('home.productShow', $newArrival->id) }}">
                  <img src="{{asset('images/' . $newArrival->image)}}" alt="{{ $newArrival->name }}" class="product-image img-fluid">
                </a>
                <a href="index.html" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="#heart"></use>
                  </svg>
                </a>
                <div class="product-content">
                  <h5 class="element-title text-uppercase fs-5 mt-3">
                    <a href="{{ route('home.productShow', $newArrival->id) }}">{{ $newArrival->name }}</a>
                  </h5>
                  <form></form>
                  <a href="{{ route('home.productShow', $newArrival->id) }}" class="text-decoration-none" data-after="View Product"><span>{{ $newArrival->discounted_price ?? $newArrival->price }}</span></a>
                </div>
              </div>
            </div>
          </div>  
          @endforeach
            
        <div class="swiper-pagination"></div>
      </div>
      <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-left"></use>
        </svg></div>
      <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-right"></use>
        </svg></div>
    </div>
  </section>
  {{-- end of Our New Arrivals Slider --}}

  {{-- Start of Classic Winter Collection --}}
  <section class="collection bg-light position-relative py-5">
    <div class="container">
      <div class="row">
        <div class="title-xlarge text-uppercase txt-fx domino">Collection</div>
        <div class="collection-item d-flex flex-wrap my-5">
          <div class="col-md-6 column-container">
            <div class="image-holder">
              <img src="{{asset('images/' . $winterCollectionThumbnail->image)}}" alt="collection" class="product-image img-fluid">
            </div>
          </div>
          <div class="col-md-6 column-container bg-white">
            <div class="collection-content p-5 m-0 m-md-5">
              <h3 class="element-title text-uppercase">{{ $winterCollectionThumbnail->category->name }}</h3>
              <p>{{$winterCollectionThumbnail->description }}</p>
              <a href="{{ route('home.shop') }}" class="btn btn-dark text-uppercase mt-3">Shop Collection</a>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </section>

  {{-- end of Classic Winter Collection --}}

  {{-- start of Best Selling Items Slider --}}
  <section id="best-sellers" class="best-sellers product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
        <h4 class="text-uppercase">Best Selling Items</h4>
        <a href="{{ route('home.shop')}}" class="btn-link">View All Products</a>
      </div>
      <div class="swiper product-swiper open-up" data-aos="zoom-out">
        <div class="swiper-wrapper d-flex">
            @foreach ($bestSellers as $bestSeller )
                 <div class="swiper-slide">
                    <div class="product-item image-zoom-effect link-effect">
                    <div class="image-holder">
                        <a href="{{ route('home.productShow', $bestSeller->id) }}">
                            <img src="{{asset('images/' . $bestSeller->image)}}" alt="{{ $bestSeller->name }}" class="product-image img-fluid">
                        </a>
                        <a href="index.html" class="btn-icon btn-wishlist">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#heart"></use>
                            </svg>
                        </a>
                        <div class="product-content">
                            <h5 class="text-uppercase fs-5 mt-3">
                                <a href="{{ route('home.productShow', $bestSeller->id) }}">{{ $bestSeller->name }}</a>
                            </h5>
                            <a href="{{ route('home.productShow', $bestSeller->id) }}" class="text-decoration-none" data-after="View Product"><span>{{ $bestSeller->discounted_price ?? $bestSeller->price }}</span></a>
                        </div>
                    </div>
                </div>
          </div>
          @endforeach
         
          
        <div class="swiper-pagination"></div>
      </div>
      <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-left"></use>
        </svg></div>
      <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-right"></use>
        </svg></div>
    </div>
  </section>
{{-- end of Best Selling Items Slider --}}

{{-- video section --}}
@if($video)
  <section class="video py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="video-content open-up" data-aos="zoom-out">
          <div class="video-bg">
            <img src="{{asset('images/'. $video->background_image)}}" alt="video" class="video-image img-fluid">
          </div>
          <div class="video-player">
            <a class="youtube" href="{{ $video->video_link }}">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="#play"></use>
              </svg>
              <img src="{{asset('images/' . $video->on_video_image)}}" alt="pattern" class="text-rotate">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif
{{-- end of video section --}}

{{-- start of Compliment Section --}}
  <section class="testimonials py-5 bg-light">
    <div class="swiper testimonial-swiper overflow-hidden my-5">
      <div class="swiper-wrapper d-flex">
        @foreach ($testimonials as $testimonial )
        <div class="swiper-slide">
          <div class="section-header text-center mt-5">
            <h3 class="section-title">{{ $testimonial->title ?? "Testimonial" }}</h3>
          </div>
          <div class="testimonial-item text-center">
            <blockquote>
              <p>{{ $testimonial->text ??  "“Best fitted white denim shirt more than expected crazy soft, flexible" }}</p>
              <div class="review-title text-uppercase">{{ $testimonial->author_name ?? "John Doe" }}</div>
            </blockquote>
          </div>
        </div>  
        @endforeach
      </div>
      <div class="testimonial-swiper-pagination d-flex justify-content-center mb-5"></div>
    </div>
  </section>

  {{-- end of Compliment Section --}}
  {{-- start of You May Also Like Slider --}}
  <section id="related-products" class="related-products product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
        <h4 class="text-uppercase">You May Also Like</h4>
        <a href="index.html" class="btn-link">View All Products</a>
      </div>
      <div class="swiper product-swiper open-up" data-aos="zoom-out">
        <div class="swiper-wrapper d-flex">
          @foreach ($isRecommended as $recommended)
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <a href="{{ route('home.productShow', $recommended->id) }}">
                  <img src="{{asset('images/' . $recommended->image)}}" alt="{{ $recommended->name }}" class="product-image img-fluid">
                </a>
                <a href="index.html" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="#heart"></use>
                  </svg>
                </a>
                  <div class="product-content">
                    <h5 class="text-uppercase fs-5 mt-3">
                      <a href="{{ route('home.productShow', $recommended->id) }}">{{ $recommended->name }}</a>
                    </h5>
                    <a href="{{ route('home.productShow', $recommended->id) }}" class="text-decoration-none" data-after="View Product"><span>{{ $recommended->discounted_price ?? $recommended->price }}</span></a>
                  </div>
                </div>
            </div>
          </div>  
          @endforeach   
        <div class="swiper-pagination"></div>
      </div>
      <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-left"></use>
        </svg></div>
      <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-right"></use>
        </svg></div>
    </div>
  </section>
  {{-- end of You May Also Like Slider --}}
  {{-- start of Logo Section --}}
  <section class="logo-bar py-5 my-5">
    <div class="container">
      <div class="row">
        <div class="logo-content d-flex flex-wrap justify-content-between">
          <img src="{{asset('images/logo1.png')}}" alt="logo" class="logo-image img-fluid">
          <img src="{{asset('images/logo2.png')}}" alt="logo" class="logo-image img-fluid">
          <img src="{{asset('images/logo3.png')}}" alt="logo" class="logo-image img-fluid">
          <img src="{{asset('images/logo4.png')}}" alt="logo" class="logo-image img-fluid">
          <img src="{{asset('images/logo5.png')}}" alt="logo" class="logo-image img-fluid">
        </div>
      </div>
    </div>
  </section>
  {{-- end of logo section --}}

  {{-- start of Newsletter section --}}
  <section class="newsletter bg-light" style="background: url(images/pattern-bg.png) no-repeat;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 py-5 my-5">
          <div class="subscribe-header text-center pb-3">
            <h3 class="section-title text-uppercase">Sign Up for our newsletter</h3>
          </div>
          <form id="form" class="d-flex flex-wrap gap-2" method="POST" action="{{ route('home.newsletter') }}">
            @csrf
            <input type="text" name="email" placeholder="Your Email Addresss" class="form-control form-control-lg">
            <button class="btn btn-dark btn-lg text-uppercase w-100" type="submit">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </section>
{{-- end of newsletter section --}}

@if($instagramImages)
{{-- start of Follow us on Instagram section --}}
  <section class="instagram position-relative">
    @foreach ($instagramImages as $instagramImage )
    <div class="d-flex justify-content-center w-100 position-absolute bottom-0 z-1">
      <a href="{{ $instagramImage->instagram_link }}" class="btn btn-dark px-5">Follow us on Instagram</a>
    </div>
    @break
    @endforeach
    <div class="row g-0">
    @foreach ($instagramImages as $instagramImage)
    <div class="col-6 col-sm-4 col-md-2">
      <div class="insta-item">
        <a href="{{ $instagramImage->instagram_link }}" target="_blank">
          <img src="{{asset('images/'. $instagramImage->image)}}" alt="instagram" class="insta-image img-fluid">
        </a>
      </div>
    </div>
    @endforeach
      
      
    
    </div>
  </section>
  {{-- end of Follow Us on Instagram Section --}}
{{-- End of Content --}}
  @endif
  @endsection