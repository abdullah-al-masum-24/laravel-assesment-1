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
                        <div class="card-header">Update Brand</div>
                        <div class="card-body">

                            <form action="{{ route('update.brand', $brand->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("put")
                                <div class="row mb-3">
                                    <label class="col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{ $brand->name }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $brand->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image"/>
                                        <img src="{{ asset( $brand->image ) }}" alt="" class="img-thumbnail"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success w-100" name="cat_btn" value="Update Brand"/>
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
