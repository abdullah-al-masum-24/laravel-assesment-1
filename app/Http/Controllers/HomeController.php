<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $products, $product, $comments;

    public function index() {

        $this->products = Product::all();
        return view("home", ["products" => $this->products]);
    }

    public function detail($id) {

        $this->product = Product::find($id);
        $this->comments = Comment::all()->where("product_id", $id)->where("status", 1);

        return view("product-detail", ["product" => $this->product, "comments" => $this->comments]);
    }
}
