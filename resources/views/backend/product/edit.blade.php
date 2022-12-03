@include("backend.product.header")
@include("backend.product.nav")
  <form action="{{ route('update',$edit->id) }}" method="POST">
    @csrf
    <input type="text" value="{{ $edit->name }}" name="name" placeholder="Enter Product Name">
    <input type="text" value="{{ $edit->des }}" name="des" placeholder="Enter Product Description">
    <input type="text" value="{{ $edit->barcode }}" name="barcode" placeholder="Enter Product Barcode">
    <select name="status">
      <option value="1" @if($edit->status == 1) selected @endif>Active</option>
      <option value="2" @if($edit->status == 2) selected @endif>Inactive</option>
    </select>
    <button>Save Change</button>
  </form>
  @include("backend.product.footer")