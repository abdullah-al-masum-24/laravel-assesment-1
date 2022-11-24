<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $imageName, $directory, $image, $category, $imgurl, $imgExtension;

    public static function getImgUrl($request) {
        self::$image = $request->file("image");
//        self::$imageName = self::$image->getClientOriginalName();
        self::$imgExtension = self::$image->getClientOriginalExtension();
        self::$imageName = "lara-commerce-cat-img-".time().".".self::$imgExtension;
        self::$directory = "category-img/";
        self::$image->move(self::$directory, self::$imageName);

        return self::$directory.self::$imageName;
    }

    public static function storeCategory($request) {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::getImgUrl($request);
        self::$category->save();
    }

    public static function updateCat($request, $id)
    {
        self::$category = Category::find($id);

        if ($request->file('image')) {
            if(file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
            self::$imgurl = self::getImgUrl($request);
        }
        else {
            self::$imgurl = self::$category->image;
        }
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imgurl;
        self::$category->save();
    }

    public static function deleteCat($id) {
        self::$category = Category::find($id);

        if (file_exists(self::$category->image)) {
            unlink(self::$category->image);
        }

        self::$category->delete();
    }

}
