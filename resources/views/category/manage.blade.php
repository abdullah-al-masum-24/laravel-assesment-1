@extends("master")

@section("title")
    Manage
@endsection

@section("main-content")

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">Manage Category</div>
                        <div class="card-body">
                            <p class="text-capitalize text-success">{{ session('message') }}</p>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)

                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td width="100" height="100">
                                            <img src="{{ asset($category->image) }}" alt="" width="100" height="100"/>
                                        </td>
                                        <td>
                                            <a href="{{ route("edit.category", $category->id) }}" class="btn  btn-sm">
                                                <i class="fa fa-edit text-success"></i>
                                            </a>
                                            <a href="{{ route("delete.category", $category->id) }}" class="btn  btn-sm">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>

                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection