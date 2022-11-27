@extends('master')

@section("title")
    edit
@endsection

@section('main-content')
    <section class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">Update Product</div>
                        <div class="card-body">

                            <form action="{{ route('update.product', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("put")
                                <div class="row mb-3">
                                    <label class="col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{ $product->name }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title" value="{{ $product->title }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Category</label>
                                    <div class="col-md-9">
                                        <select class="form-select" aria-label="Default select example" name="category_id">
                                            <option value=""> --- Select Category --- </option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Brand</label>
                                    <div class="col-md-9">
                                        <select class="form-select" aria-label="Default select example" name="brand_id">
                                            <option selected>--- Select Brand ---</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Price</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="price" value="{{ $product->price }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $product->description }}"</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image"/>
                                        <img src="{{ asset( $product->image ) }}" alt="" class="img-thumbnail"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success w-100" name="cat_btn" value="Update Product"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
