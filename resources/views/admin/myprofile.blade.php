@extends('layouts/contentLayoutMaster')

@section('title', auth()->user()->name)

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/users.css')) }}">
@endsection
@section('content')
<div id="user-profile">
  <div class="row">
      <div class="col-12">
        <div class="profile-header mb-2">
          <div class="relative">
            <div class="cover-container">
              <img class="img-fluid bg-cover rounded-0 w-100" src="{{ asset('images/profile/user-uploads/cover.jpg') }}" alt="User Profile Image">
            </div>
            <div class="profile-img-container d-flex align-items-center justify-content-between">
              <img src="uploads/{{auth()->user()->profile_image}}" class="rounded-circle img-border box-shadow-1" alt="{{auth()->user()->name}}">
              <div class="float-right">
                <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1">
                  <i class="feather icon-edit-2"></i>
                </button>
                <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary">
                  <i class="feather icon-settings"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end align-items-center profile-header-nav">
            <nav class="navbar navbar-expand-sm w-100 pr-0">
              <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
              </button>
            </nav>
          </div>
        </div>
      </div>
  </div>
  <section id="profile-info">
    <div class="row">
      <div class="col-lg-3 col-12">
        <div class="card">
          <div class="card-header">
            <h4>About</h4>
            <i class="feather icon-more-horizontal cursor-pointer"></i>
          </div>
          <div class="card-body">
            <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping cake wafer.</p>
            <div class="mt-1">
              <h6 class="mb-0">Joined:</h6>
              <p>{{$date}}</p>
            </div>
            <div class="mt-1">
              <h6 class="mb-0">School:</h6>
              <p>{{auth()->user()->school->name}}</p>
            </div>
            <div class="mt-1">
              <h6 class="mb-0">Department:</h6>
              <p>{{auth()->user()->dept->name}}</p>
            </div>
            <div class="mt-1">
              <h6 class="mb-0">Course:</h6>
              <p>{{auth()->user()->course->name}}</p>
            </div>
            <div class="mt-1">
              <h6 class="mb-0">Email:</h6>
              <p>{{auth()->user()->email}}</p>
            </div>
            <div class="mt-1">
              <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25"><i class="feather icon-facebook"></i></button>
              <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25"><i class="feather icon-twitter"></i></button>
              <button type="button" class="btn btn-sm btn-icon btn-primary p-25"><i class="feather icon-instagram"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
              <img class="card-img-top img-fluid" src="{{ asset('images/slider/06.jpg') }}" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <small class="text-muted">Last updated 3 mins ago</small>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                  of the card's content.</p>
                <a href="#" class="btn btn-outline-primary">Go somewhere</a>
              </div>
            </div>
          </div>
      </div>
      <div class="col-lg-3 col-12">
        <div class="card">
          <div class="card-header">
            <h4>Latest Photos</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4 col-6 user-latest-img">
                <img src="{{ asset('images/profile/user-uploads/user-01.jpg') }}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
              </div>
              <div class="col-md-4 col-6 user-latest-img">
                <img src="{{ asset('images/profile/user-uploads/user-02.jpg') }}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
              </div>
              <div class="col-md-4 col-6 user-latest-img">
                <img src="{{ asset('images/profile/user-uploads/user-03.jpg') }}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
              </div>
              <div class="col-md-4 col-6 user-latest-img">
                <img src="{{ asset('images/profile/user-uploads/user-04.jpg') }}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
              </div>
              <div class="col-md-4 col-6 user-latest-img">
                <img src="{{ asset('images/profile/user-uploads/user-05.jpg') }}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
              </div>
              <div class="col-md-4 col-6 user-latest-img">
                <img src="{{ asset('images/profile/user-uploads/user-06.jpg') }}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
              </div>
              <div class="col-md-4 col-6 user-latest-img">
                <img src="{{ asset('images/profile/user-uploads/user-07.jpg') }}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
              </div>
              <div class="col-md-4 col-6 user-latest-img">
                <img src="{{ asset('images/profile/user-uploads/user-08.jpg') }}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
              </div>
              <div class="col-md-4 col-6 user-latest-img">
                <img src="{{ asset('images/profile/user-uploads/user-09.jpg') }}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <button type="button" class="btn btn-primary block-element mb-1">Load More</button>
      </div>
    </div>
  </section>
</div>
@endsection
@section('page-script')
{{-- Page js files --}}
        <script src="{{ asset(mix('js/scripts/pages/user-profile.js')) }}"></script>
@endsection
