<?php

namespace App\Composer;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductsComposer
{
    public function compose(View $view){
        $products = DB::table('products')
            ->get();
        $view->with('products',$products);
    }
}
