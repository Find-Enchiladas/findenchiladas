@extends('master')
@section('title', "Find Enciladas")
@section('content')
  <header>
      <div class="container">
          <div class="row">
              <div class="col-sm-7">
                  <div class="header-content">
                      <div class="header-content-inner">
                          <h1>Find Enchilads searches dining halls across The Claremont Colleges and matches them with your preferences!</h1>
                          <a href="/signup" class="btn btn-outline btn-xl page-scroll">Signup Now!</a>
                      </div>
                  </div>
              </div>
              <div class="col-sm-5">
                  <div class="device-container">
                      <div class="device-mockup iphone6_plus portrait white">
                          <div class="device">
                              <div class="screen">
                                  <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                  <img src="{{ URL::asset('assets/img/demo-screen-1.jpg') }}" class="img-responsive" alt="">
                              </div>
                              <div class="button">
                                  <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>

  <section id="download" class="download bg-secondary text-center">
      <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <h2 class="section-heading">Find Enchiladas will go mobile soon!</h2>
                  <p>We are currently developing mobile apps! Stay tuned for updates.</p>
                  <div class="badges">
                      <a class="badge-link" href="#"><img src="{{ URL::asset('assets/img/google-play-badge.svg') }}" alt=""></a>
                      <a class="badge-link" href="#"><img src="{{ URL::asset('assets/img/app-store-badge.svg') }}" alt=""></a>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section id="features" class="features">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="section-heading">
                      <h2>Too Many Features</h2>
                      <p class="text-muted">Here's what Find Enchiladas currently offers!</p>
                      <hr>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-4">
                  <div class="device-container">
                      <div class="device-mockup iphone6_plus portrait white">
                          <div class="device">
                              <div class="screen">
                                  <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                  <img src="{{ URL::asset('assets/img/demo-screen-1.jpg') }}" class="img-responsive" alt=""> </div>
                              <div class="button">
                                  <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="feature-item">
                                  <i class="icon-screen-smartphone text-primary"></i>
                                  <h3>SMS Texts</h3>
                                  <p class="text-muted">We send you food alerts straight to your phone!</p>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="feature-item">
                                  <i class="icon-clock text-primary"></i>
                                  <h3>Customizable Schedule</h3>
                                  <p class="text-muted">Choose when to receive your text messages!</p>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="feature-item">
                                  <i class="icon-wrench text-primary"></i>
                                  <h3>Configure Dining Halls</h3>
                                  <p class="text-muted">Choose which dining halls we search for you!</p>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="feature-item">
                                  <i class="icon-power text-primary"></i>
                                  <h3>Turn Off Notifications</h3>
                                  <p class="text-muted">Don't want messages? Turn them off when you go abroad or off-campus!</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  </section>

  <section class="cta">
      <div class="cta-content">
          <div class="container">
              <h2>Go Ahead.<br>Try It!</h2>
              <a href="#contact" class="btn btn-outline btn-xl page-scroll">Search!</a>
          </div>
      </div>
      <div class="overlay"></div>
  </section>

  <section id="contact" class="contact bg-primary">
      <div class="container">
          <h2>We <i class="fa fa-heart"></i> new friends!</h2>
          <ul class="list-inline list-social">
              <li class="social-github">
                  <a href="#"><i class="fa fa-github"></i></a>
              </li>
              <li class="social-email">
                  <a href="#"><i class="fa fa-envelope"></i></a>
              </li>
              <li class="social-linkedin">
                  <a href="#"><i class="fa fa-linkedin"></i></a>
              </li>
          </ul>
      </div>
  </section>
@endsection
