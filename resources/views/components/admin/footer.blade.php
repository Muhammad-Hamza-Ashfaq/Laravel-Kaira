{{-- Start of Footer --}}
<footer id="footer" class="mt-5">
    <div class="container">
      <div class="row d-flex flex-wrap justify-content-between py-5">
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-001">
            <div class="footer-intro mb-4">
              <a href="index.html">
                <img src="{{asset('images/main-logo.png')}}" alt="logo"> | Admin Panel
              </a>
            </div>
            <p>Gravida massa volutpat aenean odio. Amet, turpis erat nullam fringilla elementum diam in. Nisi, purus
              vitae, ultrices nunc. Sit ac sit suscipit hendrerit.</p>
            <div class="social-links">
              <ul class="list-unstyled d-flex flex-wrap gap-3">
                <li>
                  <a href="#" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#facebook"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#twitter"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#youtube"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#pinterest"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#instagram"></use>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-002">
            <h5 class="widget-title text-uppercase mb-4">Quick Links</h5>
            <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
              <li class="menu-item">
                <a href="{{route('home.index')}}" class="item-anchor">Home</a>
              </li>
              {{-- <li class="menu-item">
                <a href="index.html" class="item-anchor">About</a>
              </li> --}}
              {{-- <li class="menu-item">
                <a href="blog.html" class="item-anchor">Services</a>
              </li>
              <li class="menu-item">
                <a href="styles.html" class="item-anchor">Single item</a>
              </li> --}}
              
              <li class="menu-item">
                  <a href="{{route('admin.products.index')}}" class="item-anchor">Products</a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.categories.index')}}" class="item-anchor">Categories</a>
                </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-003">
            <h5 class="widget-title text-uppercase mb-4">Help & Info</h5>
            <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
              {{-- <li class="menu-item">
                <a href="#" class="item-anchor">Track Your Order</a>
              </li> --}}
              {{-- <li class="menu-item">
                <a href="#" class="item-anchor">Returns + Exchanges</a>
              </li> --}}
              {{-- <li class="menu-item">
                <a href="#" class="item-anchor">Shipping + Delivery</a>
              </li> --}}
              <li class="menu-item">
                <a href="{{ route('home.contact') }}" class="item-anchor">Contact Us</a>
              </li>
              {{-- <li class="menu-item">
                <a href="#" class="item-anchor">Find us easy</a>
              </li> --}}
              {{-- <li class="menu-item">
                <a href="index.html" class="item-anchor">Faqs</a>
              </li> --}}
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-004 border-animation-left">
            <h5 class="widget-title text-uppercase mb-4">Contact Us</h5>
            <p>Do you have any questions or suggestions? <a href="mailto:raihamza603@gmail.com"
                class="item-anchor">raihamza603@gmail.com</a></p>
            <p>Do you need support? Give us a call. <a href="tel:+43 720 11 52 78" class="item-anchor">03030424951</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="border-top py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex flex-wrap">
            <div class="shipping">
              <span>We ship with:</span>
              <img src="{{asset('images/arct-icon.png')}}" alt="icon">
              <img src="{{asset('images/dhl-logo.png')}}" alt="icon">
            </div>
            <div class="payment-option">
              <span>Payment Option:</span>
              <img src="{{asset('images/visa-card.png')}}" alt="card">
              <img src="{{asset('images/paypal-card.png')}}" alt="card">
              <img src="{{asset('images/master-card.png')}}" alt="card">
            </div>
          </div>
          <div class="col-md-6 text-end">
            <p>© Copyright 2022 Kaira. All rights reserved. Design by <a href="https://templatesjungle.com"
                target="_blank">TemplatesJungle</a> Distribution By <a href="https://themewagon.com"
              target="blank">ThemeWagon</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  {{-- end of footer --comment by Hamza --}}
