import('./scripts.js');

$(function (){
    var x = location.href;
    var url_nike = 'http://127.0.0.1:3333/products/nike';
    var url_adidas = 'http://127.0.0.1:3333/products/adidas';
    var url_vans = 'http://127.0.0.1:3333/products/vans';
    var url_shoppingcart = 'http://127.0.0.1:3333/shoppingCart';
    if (x == url_nike || x == url_adidas || x == url_vans || x == url_shoppingcart){
        $('#mainNav').addClass('custom-nav-products');
    }

    $('.img_products').mouseenter(function (){
        $(this).attr('src',$(this).data('img'));
    });

    $('.img_products').mouseleave(function(){
        $(this).attr('src',$(this).data('src'));
    });
});

