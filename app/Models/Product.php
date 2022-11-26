<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    private static $imageName, $directory, $image, $product, $imgurl, $imgExtension, $comments;

    public static function getImgUrl($request) {
        self::$image = $request->file("image");
//        self::$imageName = self::$image->getClientOriginalName();
        self::$imgExtension = self::$image->getClientOriginalExtension();
        self::$imageName = "lara-commerce-product-img-".time().".".self::$imgExtension;
        self::$directory = "product-img/";
        self::$image->move(self::$directory, self::$imageName);

        return self::$directory.self::$imageName;
    }

    public static function storeProduct($request) {
        self::$product = new Product();
        self::$product->name = $request->name;
        self::$product->title = $request->title;
        self::$product->Category_id = $request->category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->price = $request->price;
        self::$product->description = $request->description;
        self::$product->image = self::getImgUrl($request);
        self::$product->save();
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);

        if ($request->file('image')) {
            if(file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$imgurl = self::getImgUrl($request);
        }
        else {
            self::$imgurl = self::$product->image;
        }
        self::$product->name = $request->name;
        self::$product->title = $request->title;
        self::$product->Category_id = $request->category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->price = $request->price;
        self::$product->description = $request->description;
        self::$product->image = self::$imgurl;
        self::$product->save();
    }

    public static function deleteProduct($id) {
        self::$product = Product::find($id);

        if (file_exists(self::$product->image)) {
            unlink(self::$product->image);
        }

        self::commentsDelete($id);

        self::$product->delete();
    }

    public static function commentsDelete($id) {
        self::$comments = Comment::where("product_id", $id)->delete();
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
         return $this->belongsTo(Brand::class);
    }

}
