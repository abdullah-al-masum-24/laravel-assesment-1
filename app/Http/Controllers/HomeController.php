<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $products, $product, $comments, $relatedProducts;

    public function index() {

//        $this->products = Product::orderBy("id", "DESC")->take(2)->get();
//        $this->products = Product::orderBy("id", "ASC")->take(2)->get();
        $this->products = Product::orderBy("id", "DESC")->get();

        return view("home", ["products" => $this->products]);
    }

    public function detail($id) {

        $this->product = Product::find($id);
        $this->relatedProducts = Product::orderBy("id", "DESC")->where("category_id", $this->product->category_id)->take(5)->get();
        $this->comments = Comment::all()->where("product_id", $id)->where("status", 1);

        return view("product-detail", ["product" => $this->product, "comments" => $this->comments, "relatedProducts" =>  $this->relatedProducts]);
    }
}
