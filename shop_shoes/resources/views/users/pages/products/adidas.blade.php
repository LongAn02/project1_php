@section('title','Sản phẩm adidas')
    <!doctype html>
<html lang="en">
    <head>
        @include('users.layout.head')
    </head>
    <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg nav-custom fixed-top" id="mainNav">
        @include('users.layout.navigation')
    </nav>



    <div class="container custom-container-products">
        <div class="row">
            @foreach($products as $key)
                @if($key->brand_id == 2)
                    <div class="col-lg-2 mt-3 mb-3" data-bs-target="#show_product_details" data-bs-toggle="modal">
                        <div class="_products_" data-id="{{$key->id}}">
                            <img src="{{asset('assets/img/'.$key->main_image)}}" data-img="{{asset('assets/img/'.$key->img_sp)}}" data-src="{{asset('assets/img/'.$key->main_image)}}" alt="" class="w-100 img_products">
                            <label for="" class="mt-2 d-flex justify-content-center custom-label-products">{{number_format($key->price)}}</label>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- Modal -->
    @include('product_details')
    <!-- Contact-->
    <section class="contact-section bg-black">
        @include('users.layout.contact')
    </section>
    <!-- Footer-->
    @include('users.layout.footer')
    @include('users.layout.scripts')

    @yield('ajax-modal-product-details')
    </body>
</html>

