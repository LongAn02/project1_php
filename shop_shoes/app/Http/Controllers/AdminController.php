<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProductRequest;
use App\Http\Requests\AdminUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    protected $userControler,$productController, $shoppingCartController;

    public function __construct(
        UserController $userControler,
        ProductController $productController,
        ShoppingCartController $shoppingCartController

    )
    {
        $this->userControler = $userControler;
        $this->productController = $productController;
        $this->shoppingCartController = $shoppingCartController;
    }

    public function index(){
        $sumPrice = 0;
        $users = $this->userControler->showUsers();
        $products = $this->productController->showProduct();
        foreach ($products as $product){
            $sumPrice += $product->price;
        }
        return view('admin.pages.dashboard',
            ['products' => count($products),
                'users' => count($users),
                'sumPrice' => $sumPrice,]);
    }

    public function showUsersAdmin(){
        $users = $this->userControler->showUsers();
        return view('admin.pages.show_users',['users' => $users]);
    }

    public function showProductsAdmin(){
        $products = $this->productController->showProduct();
        return view('admin.pages.show_products',['products' => $products]);
    }

    public function viewAddProduct(){
        return view('admin.pages.addProduct');
    }

    public function deleteUser(Request $request){
        $users = $this->userControler->deleteUsers($request->id);
        $this->userControler->logoutUser();
        return $users;
    }

    public function deleteProduct(Request $request){
        $product = $this->productController->deleteProduct($request->id);
        return $product;
    }

    public function searchUserAdmin(AdminUserRequest $request){
        $phoneUser = $request->input_search_user;
        $users = $this->userControler->showUserSearch($phoneUser);
        return view('admin.pages.show_users',['users' => $users]);
    }

    public function searchProductAdmin(AdminProductRequest $request){
        $nameProduct = $request->input_search_productAdmin;
        $products = $this->productController->showSearchProduct($nameProduct);
        return view('admin.pages.show_products',['products' => $products]);
    }

    public function addProduct(Request $request)
    {
        if ($request->has('main_imageProductAdd')) {
            $file_img_pr = $request->main_imageProductAdd;
            $ext_pr = $request->main_imageProductAdd->extension();
            $file_name_pr = time() . '-' . 'product.' . $ext_pr;
            $file_img_pr->move(public_path('assets/img'), $file_name_pr);
            $request->merge(['main_image' => $file_name_pr]);

        }

        if ($request->has('img_spProductAdd')){
            $file_img_sp = $request->img_spProductAdd;
            $ext_sp = $request->img_spProductAdd->extension();
            $file_name_sp = time() . '-' . 'product-sp.' . $ext_sp;
            $file_img_sp->move(public_path('assets/img'), $file_name_sp);
            $request->merge(['img_sp' => $file_name_sp]);
        }
        $this->productController->createProduct($request->nameProductAdd,
            $request->main_image,$request->priceProductAdd,$request->desciptionProductAdd,
            $request->brandProductAdd,$request->img_sp);
    }

    public function requestProduct(Request $request){
        $data_products = array(
            'id' => $request->data_id,
            'name' => $request->data_name,
            'description' => $request->data_description,
            'price' => $request->data_price,
            'brand_id' => $request->data_brand_id,
        );
        return view('update')->with('data_products',$data_products);
    }

    public function updateProduct(Request $request){
        $id = $request->idProductUpdate;
        $name = $request->nameProductUpdate;
        $price = $request->priceProductUpdate;
        $description = $request->desciptionProductUpdate;
        $brand_id = $request->brandProductUpdate;
        $this->productController->updateProduct($id,$name,$price,$description,$brand_id);
        $products = $this->productController->showProduct();
        return view('admin.pages.show_products',['products' => $products]);
    }

    public function showListCart()
    {
        $data = $this->getDataOrderDetail();
        return view('admin.pages.wait_accept_cart')->with(['data' =>$data]);
    }

    public function getDataOrderDetail()
    {
        return DB::table('order_details')
            ->select(
                [
                    'order_details.id',
                    'order_details.total',
                    'order_details.status',
                    'users.name',
                ]
            )->join('users', 'users.id', '=' ,'order_details.user_id')
            ->get();
    }

    public function acceptCart(Request $request)
    {
        return DB::table('order_details')
            ->where('id', $request->id)
            ->update(['status' => 2]);
    }

    public function cancelCart(Request $request)
    {
        return DB::table('order_details')
            ->where('id', $request->id)
            ->update(['status' => 1]);
    }
}

