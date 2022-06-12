<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function showProduct(){
        $products = DB::table('products')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->get();
        return $products;
    }

    public function showProductDetails(Request $request){
        $product = $this->showOneProduct($request->id);
        return $product;
    }

    public function deleteProduct($id){
        $products = DB::table('products')->where('id',$id)->delete();
        return $products;
    }

    public function showOneProduct($id){
        $product = DB::table('products')
            ->where('products.id',$id)
            ->first();
        return $product;
    }

    public function showSearchProduct($name){
        $product = DB::table('products')->where('name','like',$name)->get();;
        return $product;
    }

    public function createProduct($name,$main_image,$price,$description,$brand_id,$img_sp){
        DB::table('products')->insert([
            'name' => $name,
            'main_image' => $main_image,
            'price' => $price,
            'description' => $description,
            'brand_id' => $brand_id,
            'img_sp' => $img_sp,
        ]);

        $this->showProduct();
    }

    public function updateProduct($id,$name,$price,$description,$brand_id){
        DB::table('products')->where('id',$id)->update([
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'brand_id' => $brand_id,
        ]);
    }
}
