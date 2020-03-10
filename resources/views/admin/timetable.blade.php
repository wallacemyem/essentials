
@extends('layouts/contentLayoutMaster')

@section('title', 'Content Grid')

@section('content')
{{--Grid options--}}
<section id="grid-options" class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Grid options</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <p>Bootstrap’s grid system uses a series of containers, rows, and columns to layout and align content. It’s
              built with <a
                href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Using_CSS_flexible_boxes">flexbox</a>
              and is fully responsive. Below is an example and an in-depth look at how the grid comes together.</p>
            <p>While Bootstrap uses <code>em</code>s or <code>rem</code>s for defining most sizes, <code>px</code>s are
              used for grid breakpoints and container widths. This is because the viewport width is in pixels and does not
              change with the font size.</p>
            <p>See how aspects of the Bootstrap grid system work across multiple devices with a handy table.</p>
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th class="text-center">
                      Extra small<br>
                      <small>&lt;576px</small>
                    </th>
                    <th class="text-center">
                      Small<br>
                      <small>≥576px</small>
                    </th>
                    <th class="text-center">
                      Medium<br>
                      <small>≥768px</small>
                    </th>
                    <th class="text-center">
                      Large<br>
                      <small>≥992px</small>
                    </th>
                    <th class="text-center">
                      Extra large<br>
                      <small>≥1200px</small>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="text-nowrap" scope="row">Max container width</th>
                    <td>None (auto)</td>
                    <td>540px</td>
                    <td>720px</td>
                    <td>960px</td>
                    <td>1140px</td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row">Class prefix</th>
                    <td><code>.col-</code></td>
                    <td><code>.col-sm-</code></td>
                    <td><code>.col-md-</code></td>
                    <td><code>.col-lg-</code></td>
                    <td><code>.col-xl-</code></td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row"># of columns</th>
                    <td colspan="5">12</td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row">Gutter width</th>
                    <td colspan="5">30px (15px on each side of a column)</td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row">Nestable</th>
                    <td colspan="5">Yes</td>
                  </tr>
                  <tr>
                    <th class="text-nowrap" scope="row">Column ordering</th>
                    <td colspan="5">Yes</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
