
@extends('layouts/contentLayoutMaster')

@section('title', 'Documents')

@section('vendor-style')
        {{-- vendor files --}}
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
@endsection
@section('page-style')
        {{-- Page css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection

@section('content')
{{-- Data list view starts --}}
<section id="data-list-view" class="data-list-view-header">
  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
    </div>
  @endif
    <div class="action-btns d-none">
      <div class="btn-dropdown mr-1 mb-1">
        <div class="btn-group dropdown actions-dropodown">
          <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Actions
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
            <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
          </div>
        </div>
      </div>
    </div>

    {{-- DataTable starts --}}
    <div class="table-responsive">
      <table class="table data-list-view">
        <thead>
          <tr>
            <th></th>
            <th>FILE NAME</th>
            <th>FILE TYPE</th>
            <th>SIZE</th>
            <th>UPLOADED BY</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($docs as $product)
            @if($product["disk"] <= '25')
              <?php $color = "success" ?>
            @elseif($product["disk"] <= '45')
              <?php $color = "primary" ?>
            @elseif($product["disk"] <= '75')
              <?php $color = "warning" ?>
            @elseif($product["disk"] >= '80')
              <?php $color = "danger" ?>
            @endif
            <?php
              $arr = array('success', 'primary', 'info', 'warning', 'danger');
            ?>

              <tr>
              <td></td>
              <td class="product-name">{{ $product["field"] }}</td>

              <td class="product-category">
                <i class="fa fa-file-{{ $product["icon"] }}-o"></i> {{ $product["attachable_type"] }}
              </td>
              <td>
                <div class="chip chip-{{$color}}">
                  <div class="chip-body">
                    <div class="chip-text">{{ $product["disk"]}}</div>
                  </div>
                </div>
              </td>
              <td>
                {{ $product->user->name}}
              </td>
              <td class="product-action">
                <span class="action-edit"><i class="feather icon-edit"></i></span>
                <span class="action-delete"><i class="feather icon-trash"></i></span>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{-- DataTable ends --}}

    {{-- add new sidebar starts --}}
    <div class="add-new-data-sidebar">
      <div class="overlay-bg"></div>
      <div class="add-new-data">
        {!! Form::open(['action'=> 'FilesController@savedoc' , 'method'=> 'POST' , 'enctype' => 'multipart/form-data']) !!}
        @csrf
          <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
              <h4 class="text-uppercase">Add Document</h4>
            </div>
            <div class="hide-data-sidebar">
              <i class="feather icon-x"></i>
            </div>
          </div>
          <div class="data-items pb-3">
            <div class="data-fields px-2 mt-1">
              <div class="row">
                <div class="col-sm-12 data-field-col">
                  <label for="data-name">File Name</label>
                  <input type="text" class="form-control" name="name" id="data-name">
                </div>
                <div class="col-sm-12 data-field-col">
                  <label for="data-category"> Category </label>
                  <select class="form-control" name="category" id="data-category">
                    <option>Assignments</option>
                    <option>Reports</option>
                  </select>
                </div>
                <div class="col-sm-12 data-field-col data-list-upload">
                {{Form::file('img', ['class' => 'btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer'])}}
                </div>
              </div>
            </div>
          </div>
          <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
            <div class="add-data-btn">
              <input type="submit" class="btn btn-primary" value="Add Data">
            </div>
            <div class="cancel-data-btn">
              <input type="reset" class="btn btn-outline-danger" value="Cancel">
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
    {{-- add new sidebar ends --}}
  </section>
  {{-- Data list view end --}}
@endsection
@section('vendor-script')
{{-- vendor js files --}}
        <script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.select.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
@endsection
@section('page-script')
        {{-- Page js files --}}
        <script src="{{ asset(mix('js/scripts/ui/data-list-view.js')) }}"></script>
@endsection
