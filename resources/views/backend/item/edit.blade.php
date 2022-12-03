@include("backend.product.header")
@include("backend.product.nav")

<div class="container">
  <div class="row">
    <div class="col-md-6">
    <form action="{{ Route('insertitem') }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="form-group">
          <label for="">Item Name</label>
          <input type="text" value="{{ $item->name }}" name="name" class="form-control">
        </div>
        <div class="form-group">
          <img height="100" width="100" src="{{ asset('backend/items/'.$item->image) }}" alt="">
        </div>
        <div class="form-group">
          <label for="">Product Single Image</label>
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Select Status</label>
          <select name="status" class="form-control">
            <option value="">------SELECT STATUS-----</option>
            <option value="1" @if( $item->status == 1 ) selected @endif>Active</option>
            <option value="2" @if( $item->status == 2 ) selected @endif>Inactive</option>
          </select>
        </div>
        <button class="btn btn-info">Update</button>
      </form>
    </div>
    <div class="col-md-6">
        <form action="{{ Route('addNewImage',$item->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <label for="">Product Gallery Image</label>
              <input type="file" name="galleries[]" class="form-control" multiple>
            </div>
            <button class="btn btn-success mt-3">Add New Image</button>
        </form>
        @foreach($galleries as $gallery)
          <div class="images m-3">
            <img src="{{ asset('backend/items/gallery/'.$gallery->images) }}" alt="">
            <div class="delete">
              <a href="{{Route('galleryDelete',$gallery->id)}}" class="btn btn-danger btn-sm">X</a>
            </div>
          </div>
        @endforeach
    </div>
  </div>
</div>
<style>
  .images{
    position:relative;
    width:150px;
  }
  .images img{
    height:100;
    width:150px;
  }
  .images img:hover + .delete{
    display:flex;
  }
  .delete{
    background:rgba(0,0,0,.5);
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    display:none;
    justify-content:center;
    align-items:center;
  }
</style>

@include("backend.product.footer")