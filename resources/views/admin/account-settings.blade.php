@extends('layouts/contentLayoutMaster')

@section('title', 'Account Settings')

@section('vendor-style')
        <!-- vendor css files -->
        <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
        <link rel='stylesheet' href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.css')) }}">
@endsection
@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/noui-slider.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/core/colors/palette-noui.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/toastr.css')) }}">
@endsection

@section('content')
<!-- account setting page start -->
<section id="page-account-settings">
    <div class="row">
      <!-- left menu section -->
      <div class="col-md-3 mb-2 mb-md-0">
        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
          <li class="nav-item">
            <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
              href="#xcdet" aria-expanded="true">
              <i class="feather icon-globe mr-50 font-medium-3"></i>
              General
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
              href="#opksew" aria-expanded="false">
              <i class="feather icon-lock mr-50 font-medium-3"></i>
              Change Password
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill"
              href="#ndkosjk" aria-expanded="false">
              <i class="feather icon-message-circle mr-50 font-medium-3"></i>
              Notifications
            </a>
          </li>
        </ul>
      </div>
      <!-- right content section -->

      <div class="col-md-9">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="tab-content">
                @if (session('status'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('status') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                  </button>
                  </div>
                @endif
                <div role="tabpanel" class="tab-pane active" id="xcdet"
                  aria-labelledby="account-pill-general" aria-expanded="true">
                  {!! Form::open(['action'=> 'AccountController@update' , 'method'=> 'POST' , 'enctype' => 'multipart/form-data']) !!}
                  @csrf
                  <div class="media">
                    <a href="javascript: void(0);">
                      <img src="storage/profile_image/{{auth()->user()->profile_image}}" class="rounded mr-75"
                        alt="{{auth()->user()->name}}" height="64" width="64">
                    </a>
                    <div class="media-body mt-75">
                      <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                        {{Form::file('profile_image', ['class' => 'btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer'])}}
                        <input type="file" id="profile_image" hidden>
                        <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                      </div>
                      <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                          size of
                          5mB</small></p>
                    </div>
                  </div>
                  <hr>

                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label for="account-username">Username</label>
                            {{Form::text('username' , auth()->user()->username , ['class' => 'form-control' , 'placeholder' => 'Username'])}}
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label for="account-username">Email</label>
                            {{Form::text('email' , auth()->user()->email , ['class' => 'form-control' , 'placeholder' => 'Email'])}}
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label for="account-name">Name</label>
                            {{Form::text('name' , auth()->user()->name , ['class' => 'form-control' , 'placeholder' => 'Name'])}}
                          </div>
                        </div>
                      </div>

                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                          changes</button>
                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                      </div>
                    </div>
                  {!! Form::close() !!}
                </div>
                <div class="tab-pane fade " id="opksew" role="tabpanel"
                  aria-labelledby="account-pill-password" aria-expanded="false">
                  {!! Form::open(['action'=> 'AccountController@password' , 'method'=> 'POST' , 'enctype' => 'multipart/form-data']) !!}
                  @csrf
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label for="account-old-password">Old Password</label>
                            <input type="password" name="old-pass" class="form-control" id="account-old-password" required
                              placeholder="Old Password"
                              data-validation-required-message="This old password field is required">
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label for="account-new-password">New Password</label>
                            <input type="password" name="password" id="account-new-password" class="form-control"
                              placeholder="New Password" required
                              data-validation-required-message="The password field is required" minlength="8">
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label for="account-retype-new-password">Retype New
                              Password</label>
                            <input type="password" name="conpassword" class="form-control" required
                              id="account-retype-new-password" data-validation-match-match="password"
                              placeholder="New Password"
                              data-validation-required-message="The Confirm password field is required" minlength="8">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                          changes</button>
                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                      </div>
                    </div>
                  {!! Form::close() !!}
                </div>

                <div class="tab-pane fade" id="ndkosjk" role="tabpanel"
                  aria-labelledby="account-pill-notifications" aria-expanded="false">
                  <div class="row">
                    <h6 class="m-1">Activity</h6>
                    <div class="col-12 mb-1">
                      <div class="custom-control custom-switch custom-control-inline">
                        <input type="checkbox" class="custom-control-input" checked id="accountSwitch1">
                        <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                        <span class="switch-label w-100">Email me when someone comments
                          onmy
                          article</span>
                      </div>
                    </div>
                    <div class="col-12 mb-1">
                      <div class="custom-control custom-switch custom-control-inline">
                        <input type="checkbox" class="custom-control-input" checked id="accountSwitch2">
                        <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                        <span class="switch-label w-100">Email me when someone answers on
                          my
                          form</span>
                      </div>
                    </div>
                    <div class="col-12 mb-1">
                      <div class="custom-control custom-switch custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                        <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                        <span class="switch-label w-100">Email me hen someone follows
                          me</span>
                      </div>
                    </div>
                    <h6 class="m-1">Application</h6>
                    <div class="col-12 mb-1">
                      <div class="custom-control custom-switch custom-control-inline">
                        <input type="checkbox" class="custom-control-input" checked id="accountSwitch4">
                        <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                        <span class="switch-label w-100">News and announcements</span>
                      </div>
                    </div>
                    <div class="col-12 mb-1">
                      <div class="custom-control custom-switch custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                        <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                        <span class="switch-label w-100">Weekly product updates</span>
                      </div>
                    </div>
                    <div class="col-12 mb-1">
                      <div class="custom-control custom-switch custom-control-inline">
                        <input type="checkbox" class="custom-control-input" checked id="accountSwitch6">
                        <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                        <span class="switch-label w-100">Weekly blog digest</span>
                      </div>
                    </div>
                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                      <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                        changes</button>
                      <button type="reset" class="btn btn-outline-warning">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- account setting page end -->
@endsection

@section('vendor-script')
        <!-- vendor files -->
        <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset(mix('js/scripts/pages/account-setting.js')) }}"></script>
        <script src="{{ asset(mix('js/scripts/extensions/toastr.js')) }}"></script>
@endsection
