@include("backend.product.header")
@include("backend.product.nav")
  <h1>All Products Manage Here</h1>
  <a class="btn btn-info mb-2" href="{{ Route('product') }}">Add New</a>
  <table class="table" border="1">
    <tr>
      <th>#sl</th>
      <th>Product Name</th>
      <th>Product Description</th>
      <th>Barcode</th>
      <th>Status</th>
      <th colspan="2">Action</th>
    </tr>
    <?php $sl = 1; ?>
    @foreach($products as $data)
        <tr>
          <td>{{ $sl }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->des }}</td>
          <td>{{ $data->barcode }}</td>
          <td>
            @if ($data->status == 1)
             <a class="btn btn-sm btn-warning" href="{{ Route('active',$data->id) }}">Active</a>
            @else 
            <a class="btn btn-sm btn-secondary" href="{{ Route('inactive',$data->id) }}">Inactive</a>
            @endif </td>
          <td><a class="m-1 btn btn-sm btn-info" href="{{ Route('edit',$data->id) }}">Edit</a>
          <button data-bs-toggle="modal" data-bs-target="#delete{{ $data->id }}" class="btn btn-sm btn-danger" href="{{ route('delete',$data->id) }}">Delete</button></td>
        </tr>
        <?php $sl++; ?>
        <!-- Modal -->
<div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this Product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{ Route('delete',$data->id) }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
    @endforeach


  </table>
  @include("backend.product.footer")