@extends('layouts/contentLayoutMaster')

@section('title', 'Assignment')

@section('vendor-style')
        <!-- vendor css files -->
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
@endsection
@section('content')


<!-- full Editor start -->
<section class="full-editor">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Question</h4>
        </div>
        <div class="card-content collapse show">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <div id="full-wrapper">
                  <div id="full-container">
                    <div class="editor">
                      
                    </div>
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
<!-- full Editor end -->
@endsection

@section('vendor-script')
        <!-- vendor files -->
        <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/jquery.steps.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset(mix('js/scripts/editors/editor-quill.js')) }}"></script>
@endsection
