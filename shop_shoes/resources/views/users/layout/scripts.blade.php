<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Jquery-->
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<!-- Core theme JS-->
<script src="{{asset('js/my_js.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

@yield('ajax-delete-user')
@yield('ajax-cofim-delete-product')
@yield('ajax-shopping-card')
@section('ajax-modal-product-details')
    <script>
        $(function (){
            $('._products_').click(function (){
                $.ajax({
                    url : `{{route('productsDetails')}}`,
                    type : 'post',
                    data : {
                        id : $(this).attr('data-id'),
                        _token : $('meta[name="csrf-toker"]').attr('content')
                    },
                    success : function (data){
                        console.log(data);
                        $('#addShoppingCart').attr('value',data.id);
                        $('#modal-image-product').attr('src', url_img + '/' + data.main_image);
                        $('#modal-title-product').text(data.name)
                        $('#modal-price-product').text(data.price)
                        $('#modal-brand-product').text(data.name_brand)
                        $('#modal-description-product').text(data.description);
                    }
                });
            });


        })
    </script>
@endsection

