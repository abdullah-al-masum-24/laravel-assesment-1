@extends("master")

@section("title")
    Manage
@endsection

@section("main-content")

    <section class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    @if($brands->isNotEmpty())
                    <div class="card">
                        <div class="card-header">Manage Brand</div>
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
                                @foreach($brands as $brand)

                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->description }}</td>
                                        <td width="100" height="100">
                                            <img src="{{ asset($brand->image) }}" alt="" width="100" height="100"/>
                                        </td>
                                        <td>
                                            <a href="{{ route("edit.brand", $brand->id) }}" class="btn  btn-sm">
                                                <i class="fa fa-edit text-success"></i>
                                            </a>
                                            <a href="{{ route("delete.brand", $brand->id) }}" class="btn  btn-sm">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>

                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                        <div class="col-md-12 notify text-center text-primary fw-bold p-5 display-3">
                            No Brands
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
