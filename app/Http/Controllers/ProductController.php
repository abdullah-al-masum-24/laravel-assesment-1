<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products, $product, $categories, $brands;

    public function addProduct() {

        $this->categories = Category::all();
        $this->brands = Brand::all();

        return view("product.add", ["categories" =>  $this->categories, "brands" =>  $this->brands]);
    }

    public function manageProduct() {
        $this->products = Product::all();
        return view("product.manage", ['products' => $this->products]);
    }

    public function createProduct( Request $request ) {

        Product::storeProduct($request);
        return redirect("/product/manage")->with('message', 'new product  add with successfully !!');
    }

    public function editProduct($id) {

        $this->product = Product::find($id);

        $this->categories = Category::all();
        $this->brands = Brand::all();

        return view("product.edit", ["product" => $this->product, "categories" =>  $this->categories, "brands" =>  $this->brands]);
    }

    public function updateProduct( Request $request, $id ) {

        Product::updateProduct($request, $id);
        return redirect("/product/manage")->with('message', 'product update with successfully !!');

    }

    public function deleteProduct($id) {

        Product::deleteProduct($id);
        return redirect("/product/manage")->with('message', 'product delete with successfully !!');
    }

    public function categoryProductShow($id) {

        $this->products = Product::all()->where("category_id", $id);
        return view("category.index", ['products' => $this->products]);

    }
    public function brandProductShow($id) {

        $this->products = Product::all()->where("brand_id", $id);
        return view("category.index", ['products' => $this->products]);

    }
}
