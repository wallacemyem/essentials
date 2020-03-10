
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
        <!-- vendor css files -->
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/dashboard-ecommerce.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
@endsection
@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/pages/dashboard-analytics.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/pages/card-analytics.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
  @endsection

  @if(auth()->user()->user_level->id == 1)
  @section('content')
    {{-- Dashboard Analytics Start --}}
    <script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
    <section id="dashboard-analytics">
      <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="card bg-analytics text-white">
            <div class="card-content">
              <div class="card-body text-center">
                <img src="{{ asset('images/elements/decore-left.png') }}" class="img-left" alt="card-img-left">
                <img src="{{ asset('images/elements/decore-right.png')}}" class="img-right" alt="card-img-right">
                <div class="avatar avatar-xl bg-primary shadow mt-0">
                    <div class="avatar-content">
                      <img src="storage/profile_image/{{auth()->user()->profile_image}}" class="mx-auto mb-1" alt="{{auth()->user()->name}}">
                    </div>
                </div>
                <div class="text-center">
                  <h1 class="mb-2 text-white">Welcome {{auth()->user()->name}},</h1>
                  <p class="m-auto w-75">You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
              <div class="card-header d-flex flex-column align-items-start pb-0">
                  <div class="avatar bg-rgba-primary p-50 m-0">
                      <div class="avatar-content">
                          <i class="feather icon-users text-primary font-medium-5"></i>
                      </div>
                  </div>
                  <h2 class="text-bold-700 mt-1 mb-25">92.6k</h2>
                  <p class="mb-0">Subscribers Gained</p>
              </div>
              <div class="card-content">
                  <div id="subscribe-gain-chart"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-package text-warning font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25">97.5K</h2>
                    <p class="mb-0">Number of Task</p>
                </div>
                <div class="card-content">
                    <div id="orders-received-chart"></div>
                </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="mb-0">Users List</h4>
            </div>


            <div class="card-content">
              <div class="table-responsive mt-1">

                <table class="table table-hover-animation mb-0">
                  <thead>
                    <tr>
                      <th>EMAIL</th>
                      <th>NAME</th>
                      <th>SCHOOL</th>
                      <th>DEPARTMENT</th>
                      <th>COURSE</th>
                      <th>DATE JOINED</th>
                      <th>ROLE</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                    @foreach($users as $user)
                  <tbody>
                    <tr>
                      <td>{{$user->email}}</td>
                      <td>{{$user->name}}</td>
                      <td class="p-1">
                        {{$user->school->name}}
                      </td>
                      <td>{{$user->dept->name}}</td>
                      <td>
                        {{$user->course->name}}
                      </td>
                      <td>{{$user->created_at}}</td>
                      <td>{{$user->user_level->name}}</td>
                      <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                      </td>
                    </tr>
                  </tbody>
                    @endforeach
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>

          </section>
  <!-- Dashboard Analytics end -->
  @endsection
  @else
  @section('content')
  <section id="basic-examples">
  <div class="row match-height">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card overlay-img-card text-white">
          <?php
              // I'm in Nigeria so my timezone is Africa/Lagos
              date_default_timezone_set('Africa/Lagos');

              // 24-hour format of an hour without leading zeros (0 through 23)
              $Hour = date('G');

              if ( $Hour >= 5 && $Hour <= 7 ) {
                  echo '<img src="images/weather/sunrise1.jpg" class="card-img" alt="current time"/>';
              } else if ( $Hour >= 7  && $Hour <= 11 ) {
                  echo '<img src="images/weather/afternoon-1.jpg" class="card-img" alt="current time"/>';
                } else if ( $Hour >= 12 && $Hour <= 13 ) {
                    echo '<img src="images/weather/afternoon-2.jpg" class="card-img" alt="current time"/>';
              } else if ( $Hour >= 14 && $Hour <= 17 ) {
                  echo '<img src="images/weather/evening.jpg" class="card-img" alt="current time"/>';
                } else if ( $Hour >= 18 && $Hour <= 19 ) {
                    echo '<img src="images/weather/sunset.jpg" class="card-img" alt="current time"/>';
                } else if ( $Hour >= 20 || $Hour <= 4 ) {
                    echo '<img src="images/weather/night.jpg" class="card-img" alt="current time"/>';
              }
              ?>
          <div class="card-img-overlay overlay-black">
            <h5 class="font-medium-5 text-white text-center mt-4">
              <?php
                  // I'm in Nigeria so my timezone is Africa/Lagos
                  date_default_timezone_set('Africa/Lagos');

                  // 24-hour format of an hour without leading zeros (0 through 23)
                  $Hour = date('G');

                  if ( $Hour >= 5 && $Hour <= 11 ) {
                      echo "Good Morning";
                  } else if ( $Hour >= 12 && $Hour <= 18 ) {
                      echo "Good Afternoon";
                  } else if ( $Hour >= 19 || $Hour <= 4 ) {
                      echo "Good Evening";
                  }
                  ?>
            </h5>
            <p class="text-white text-center">
              {{$hour}}
            </p>
            <div class="card-content">
              <div class="d-flex justify-content-around mt-2">
                <div class="icon">
                  <i class="feather icon-cloud-snow font-large-5"></i>
                </div>
                <div class="temprature mt-3">
                  <p class="font-large-3"> -6 <span class="mt-1">&#176;</span></p>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between mt-4">
                  <div class="precipitation">
                    <span class="font-medium-3">Precipitation</span>
                  </div>
                  <div class="degree">
                    <span class="font-medium-3">48%</span>
                  </div>
                </div>
                <div class="d-flex justify-content-between my-2">
                  <div class="humidity">
                    <span class="font-medium-3">Humidity</span>
                  </div>
                  <div class="degree">
                    <span class="font-medium-3">60%</span>
                  </div>
                </div>
                <div class="d-flex justify-content-between my-2">
                  <div class="wind">
                    <span class="font-medium-3">Wind</span>
                  </div>
                  <div class="degree">
                    <span class="font-medium-3">23 km/h</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="col-lg-4 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title w-100">
              {{auth()->user()->name}}
            </h4>
            <p class="">{{auth()->user()->user_level->name}} at {{auth()->user()->school->name}}</p>
            <div class="heading-elements">
              <ul class="list-inline mb-0">

              </ul>
            </div>
          </div>
          <div class="card-content">
            <div class="card-body">
              <img class="img-fluid" src="storage/profile_image/{{auth()->user()->profile_image}}" alt="img placeholder">
              <div class="d-flex justify-content-start mt-2">
                <div class="icon-like mr-2">
                  <i class="feather icon-thumbs-up text-success font-medium-5 align-middle"></i>
                  <span>368</span>
                </div>
                <div class="icon-comment mr-2">
                  <i class="feather icon-message-square font-medium-5 align-middle text-primary"></i>
                  <span>341</span>
                </div>
                <div class="icon-dislike">
                  <i class="feather icon-thumbs-down font-medium-5 align-middle text-danger"></i>
                  <span>53</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="col-xl-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-content">
          <img class="card-img-top img-fluid" src="{{ asset('images/pages/content-img-1.jpg') }}"
            alt="Card image cap">
          <div class="card-body">
            <h5>{{$file->field}}</h5>
            <p class="card-text  mb-0">By {{$file->user->name}}</p>
            <span class="card-text">{{$file->attachment}}</span>
            <div class="card-btns d-flex justify-content-between mt-2">
              <a href="#" class="btn gradient-light-primary text-white">Download</a>
              <a href="#" class="btn btn-outline-primary">View All</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Profile Cards Ends -->
  </div>
</section>
<!-- // Basic example and Profile cards section end -->
  @endsection
  @endif

@section('vendor-script')

        <!--@if($hour < '7:30 am')
        <img src="{{ asset('images/weather/afternoon-2.jpg') }}" class="card-img" alt="current time">
        @elseif($hour < '10:31 am')
        <img src="{{ asset('images/weather/morning.jpg') }}" class="card-img" alt="current time">
        @elseif($hour < '11:59 am')
        <img src="{{ asset('images/weather/afternoon-1.jpg') }}" class="card-img" alt="current time">
        @elseif($hour < '1:31 pm')
        <img src="{{ asset('images/weather/afternoon-2.jpg') }}" class="card-img" alt="current time">
        @elseif($hour < '5:31 pm')
        <img src="{{ asset('images/weather/evening.jpg') }}" class="card-img" alt="current time">
        @elseif($hour < '7:31 pm')
        <img src="{{ asset('images/weather/sunset.jpg') }}" class="card-img" alt="current time">
        @else($hour < '11:59 pm')
        <img src="{{ asset('images/weather/night.jpg') }}" class="card-img" alt="current time">
        @endif
        vendor files -->
        <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.select.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset(mix('js/scripts/pages/dashboard-analytics.js')) }}"></script>
        <script src="{{ asset(mix('js/scripts/ui/data-list-view.js')) }}"></script>
        {{-- Page js files --}}
        <script src="{{ asset(mix('js/scripts/pages/app-chat.js')) }}"></script>
@endsection
