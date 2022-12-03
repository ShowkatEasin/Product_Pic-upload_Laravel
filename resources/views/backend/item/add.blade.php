@include("backend.product.header")
@include("backend.product.nav")
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form action="{{ Route('insertitem') }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="form-group">
          <label for="">Item Name</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Product Single Image</label>
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Product Gallery Image</label>
          <input type="file" name="galleries[]" class="form-control" multiple>
        </div>
        <div class="form-group">
          <label for="">Select Status</label>
          <select name="status" class="form-control">
            <option value="">------SELECT STATUS-----</option>
            <option value="1">Active</option>
            <option value="2">Inactive</option>
          </select>
        </div>
        <button class="btn btn-info">Save</button>
      </form>
      </div>
    </div>
  </div>
@include("backend.product.footer")