<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brands, $brand;

    public function addBrand() {
        return view("brand.add");
    }

    public function manageBrand() {
        $this->brands = Brand::all();
        return view("brand.manage", ['brands' => $this->brands]);
    }

    public function createBrand( Request $request ) {

        Brand::storeBrand($request);
        return redirect("/brand/manage")->with('message', 'new brand  add with successfully !!');
    }

    public function editBrand($id) {

        $this->brand = Brand::find($id);
        return view("brand.edit", ["brand" => $this->brand]);
    }

    public function updateBrand( Request $request, $id ) {

        Brand::updateBrand($request, $id);
        return redirect("/brand/manage")->with('message', 'brand update with successfully !!');

    }

    public function deleteBrand($id) {

        Brand::deleteBrand($id);
        return redirect("/brand/manage")->with('message', 'brand delete with successfully !!');
    }
}
