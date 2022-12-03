@include("backend.product.header")
@include("backend.product.nav")
  <div class="container">
    <div class="row">
      <div class="col-md-4 border border-info rounded p-2">
        <h3>Add Category Form</h3>
        
        <div class="form-group mt-2">
          <label for="name">Category Name</label>
          <input type="text" class="name form-control">
        </div>
        <div class="form-group mt-2">
          <label for="des">Description</label>
          <input type="text" class="des form-control">
        </div>
        <div class="form-group mt-2">
          <label for="status">Status</label>
          <select class="status form-control">
            <option value="1">Active</option>
            <option value="2">Inactive</option>
          </select>
        </div>
        <button class="save btn btn-info mt-2">Save</button>
        <button style="display:none" class="update btn btn-info mt-2">Update</button>
      </div>
      <div class="col-md-8">
      <button data-bs-toggle="modal" data-bs-target="#add" class="btn btn-success">Add New</button>
         <table class="table">
            <thead>
              <tr>
                 <th>Sl</th>
                 <th>Category Name</th>
                 <th>Category Description</th>
                 <th>Status</th>
                 <th>Action</th>
              </tr>
            </thead>
            <tbody class="tdata">
            </tbody>
         </table>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this Category?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="mdelete btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!-- Uldate Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Add Category Form</h3>
          <div class="form-group mt-2">
            <label for="name">Category Name</label>
            <input type="text" id="name" class="form-control">
          </div>
          <div class="form-group mt-2">
            <label for="des">Description</label>
            <input type="text" id="des" class=" form-control">
          </div>
          <div class="form-group mt-2">
            <label for="status">Status</label>
            <select id="status" class=" form-control">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save" class="btn btn-primary">Save changes</button>
        <button style="display:none" id="update" class=" btn btn-info mt-2">Update</button>
      </div>
    </div>
  </div>
</div>
@include("backend.product.footer")