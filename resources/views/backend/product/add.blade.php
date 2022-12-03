@include("backend.product.header")
@include("backend.product.nav")
  <form action="{{ route('abc') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter Product Name">
    <input type="text" name="des" placeholder="Enter Product Description">
    <input type="text" name="barcode" placeholder="Enter Product Barcode">
    <select name="status">
      <option value="1">Active</option>
      <option value="2">Inactive</option>
    </select>
    <button>Save</button>
  </form>
  @include("backend.product.footer")