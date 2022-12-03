@include("backend.product.header")
@include("backend.product.nav")

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Image</th>
            <th>Status</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $sl=1; @endphp
          @foreach($items as $item)
            <tr>
              <td>{{ $sl }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->image }}</td>
              <td>{{ $item->status }}</td>
              <td>
                <a class="btn btn-sm btn-info" href="{{ Route('edititem',$item->id) }}">View</a>
                <a class="btn btn-sm btn-danger" href="#">Delete</a>
              </td>
            </tr>
            @php $sl++; @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@include("backend.product.footer")