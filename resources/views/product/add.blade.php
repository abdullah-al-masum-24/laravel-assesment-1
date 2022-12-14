@extends("master")

@section("title")
    Add
@endsection

@section("main-content")

    <section class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">Add New Product</div>
                        <div class="card-body">
                            <form action="{{ route('create.product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" required/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title" required/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Category</label>
                                    <div class="col-md-9">
                                        <select class="form-select" aria-label="Default select example" name="category_id" required>
                                            <option selected>--- Category ---</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Brand</label>
                                    <div class="col-md-9">
                                        <select class="form-select" aria-label="Default select example" name="brand_id" required>
                                            <option selected>--- Brand ---</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Price</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="price" required/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image" required/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success w-100" name="cat_btn" value="Add Product"/>
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
