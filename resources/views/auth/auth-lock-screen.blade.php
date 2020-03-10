@extends('layouts/fullLayoutMaster')

@section('title', 'Lock Screen')

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection
@section('content')
<section class="row flexbox-container">
  <div class="col-xl-7 col-10 d-flex justify-content-center">
      <div class="card bg-authentication rounded-0 mb-0 w-100">
          <div class="row m-0">
              <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                  <img src="{{ asset('images/pages/lock-screen.png') }}" alt="branding logo">
              </div>
              <div class="col-lg-6 col-12 p-0">
                  <div class="card rounded-0 mb-0 px-2 pb-2">
                      <div class="card-header pb-1">
                          <div class="card-title">
                              <h4 class="mb-0">Your Session is locked</h4>
                          </div>
                      </div>
                      <div class="card-content">
                          <div class="card-body pt-1">
                            {!! Form::open(['action'=> 'LockScreenController@unlock' , 'method'=> 'POST' , 'enctype' => 'multipart/form-data']) !!}
                            @csrf
                                  <fieldset class="form-label-group position-relative has-icon-left">
                                      <input type="text" class="form-control" value= "{{auth()->user()->username}}" iid="disabledInput" disabled placeholder="Username" required>
                                      <div class="form-control-position">
                                          <i class="feather icon-user"></i>
                                      </div>
                                      <label for="user-name">Username</label>
                                  </fieldset>

                                  <fieldset class="form-label-group position-relative has-icon-left">
                                      <input name="password" type="password" class="form-control"  placeholder="Password" required>
                                      <div class="form-control-position">
                                          <i class="feather icon-lock"></i>
                                      </div>
                                      <label for="user-password">Password</label>
                                  </fieldset>
                                  <a href="login">Are you not {{auth()->user()->name}} ?</a>
                                  <button type="submit" class="btn btn-primary float-right">Unlock</button>
                              {!! Form::close() !!}
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset(mix('js/scripts/forms/form-tooltip-valid.js')) }}"></script>
@endsection
