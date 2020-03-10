{{-- add new sidebar starts --}}
<div class="add-new-data-sidebar">
<div class="overlay-bg"></div>
<div class="add-new-data">
  <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
    <div>
      <h4 class="text-uppercase">Thumb View Data</h4>
    </div>
    <div class="hide-data-sidebar">
      <i class="feather icon-x"></i>
    </div>
  </div>
  <div class="data-items pb-3">
    <div class="data-fields px-2 mt-1">
      <div class="row">
        <div class="col-sm-12 data-field-col">
          <label for="data-name">Name</label>
          <input type="text" class="form-control" id="data-name">
        </div>
        <div class="col-sm-12 data-field-col">
          <label for="data-category"> Category </label>
          <select class="form-control" id="data-category">
            <option>Audio</option>
            <option>Computers</option>
            <option>Fitness</option>
            <option>Appliance</option>
          </select>
        </div>
        <div class="col-sm-12 data-field-col">
          <label for="data-status">Order Status</label>
          <select class="form-control" id="data-status">
            <option>Pending</option>
            <option>Canceled</option>
            <option>Delivered</option>
            <option>On Hold</option>
          </select>
        </div>
        <div class="col-sm-12 data-field-col">
          <label for="data-price">Price</label>
          <input type="text" class="form-control" id="data-price">
        </div>
        <div class="col-sm-12 data-field-col data-list-upload">
          <form action="#" class="dropzone dropzone-area" id="dataListUpload">
            <div class="dz-message">Upload Image</div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
    <div class="add-data-btn">
      <button class="btn btn-primary">Add Data</button>
    </div>
    <div class="cancel-data-btn">
      <button class="btn btn-outline-danger">Cancel</button>
    </div>
  </div>
</div>
</div>
{{-- add new sidebar ends --}}
