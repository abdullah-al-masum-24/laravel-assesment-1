<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories, $category;

    public function addCategory() {
        return view("category.add");
    }

    public function manageCategory() {
        $this->categories = Category::all();
        return view("category.manage", ['categories' => $this->categories]);
    }

    public function createCategory( Request $request ) {

        Category::storeCategory($request);
        return redirect("/category/manage")->with('message', 'new category  add with successfully !!');
    }

    public function editCategory($id) {

        $this->category = Category::find($id);
        return view("category.edit", ["category" => $this->category]);
    }

    public function updateCategory( Request $request, $id ) {

        Category::updateCat($request, $id);
        return redirect("/category/manage")->with('message', 'category update with successfully !!');

    }

    public function deleteCategory($id) {

        Category::deleteCat($id);
        return redirect("/category/manage")->with('message', 'category delete with successfully !!');
    }
}
