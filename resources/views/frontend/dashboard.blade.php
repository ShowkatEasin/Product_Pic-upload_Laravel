{{-- header blade --}}
@include('frontend.includes.header')
   
 <!-- headerNav blade -->
@include('frontend.includes.headerNav') 
<!-- End header area -->
    

 <!-- headerBranding blade -->
@include('frontend.includes.headerBranding') 
 <!-- End site branding area -->
    
    
  <!-- mainmenu blade -->
@include('frontend.includes.mainmenu') 
 <!-- End mainmenu area -->
    
   <!-- slider blade -->
@include('frontend.includes.slider') 
     <!-- End slider area -->
    
     @include('frontend.includes.promoarea') 
     <!-- End promo area -->
    

     <div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Latest Products</h2>
                    <div class="product-carousel">
                      @foreach($subcats as $product)
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="{{asset('backend/subcatImage/'.$product->image)}}" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="{{route('single',$product->id)}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2><a href="single-product.html">{{ $product->name }}</a></h2>
                            
                            <div class="product-carousel-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div> 
                        </div>
                      @endforeach
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="{{asset('frontend')}}/img/product-2.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2>Nokia Lumia 1320</h2>
                            <div class="product-carousel-price">
                                <ins>$899.00</ins> <del>$999.00</del>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
     <!-- End main content area -->
   

     @include('frontend.includes.brandArea') 
     <!-- End brands area -->
    
    
     @include('frontend.includes.productFind') 
     <!-- End product widget area -->
    
    
     @include('frontend.includes.footerTop') 
     <!-- End footer top area -->
    
     @include('frontend.includes.footerButton') 
     <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="{{asset('frontend')}}/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="{{asset('frontend')}}/js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="{{asset('frontend')}}/js/bxslider.min.js"></script>
	<script type="text/javascript" src="{{asset('frontend')}}/js/script.slider.js"></script>
  </body>
</html>