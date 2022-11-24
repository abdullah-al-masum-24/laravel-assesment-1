<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $imageName, $directory, $image, $brand, $imgurl, $imgExtension;

    public static function getImgUrl($request) {
        self::$image = $request->file("image");
//        self::$imageName = self::$image->getClientOriginalName();
        self::$imgExtension = self::$image->getClientOriginalExtension();
        self::$imageName = "lara-commerce-brand-img-".time().".".self::$imgExtension;
        self::$directory = "brand-img/";
        self::$image->move(self::$directory, self::$imageName);

        return self::$directory.self::$imageName;
    }

    public static function storeBrand($request) {
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::getImgUrl($request);
        self::$brand->save();
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);

        if ($request->file('image')) {
            if(file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$imgurl = self::getImgUrl($request);
        }
        else {
            self::$imgurl = self::$brand->image;
        }
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::$imgurl;
        self::$brand->save();
    }

    public static function deleteBrand($id) {
        self::$brand = Brand::find($id);

        if (file_exists(self::$brand->image)) {
            unlink(self::$brand->image);
        }

        self::$brand->delete();
    }
}
