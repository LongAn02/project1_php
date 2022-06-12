<div class="modal faded" id="show_product_details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-product"></h5>
                <h2 class="d-flex justify-content-end ms-5">$<span id="modal-price-product"></span></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <div>
                    <img src="" alt="" id="modal-image-product" style="width: 100%">
                </div>
                <div>
                    <ul>
                        <li id="modal-brand-product"></li>
                        <li id="modal-description-product"></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addShoppingCart" value="">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>
</div>

@section('ajax-shopping-card')
    <script>
        $(function (){
            $('#addShoppingCart').click(function (){

                $.ajax({
                    url : `{{route('addProductCart')}}`,
                    type : 'post',
                    data : {
                        id : $(this).attr('value'),
                        _token : $('meta[name="csrf-toker"]').attr('content')
                    },

                    success : function (data){
                        Swal.fire(
                            'Thông báo!',
                            'Đã thêm sản phẩm vào giỏ hàng!',
                            'success'
                        )
                    },
                });
            });

        })
        let url_img = `{{asset('assets/img')}}`;
    </script>
@endsection


