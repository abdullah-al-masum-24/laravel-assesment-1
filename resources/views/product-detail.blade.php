@extends("master")

@section("title")
    Home
@endsection

@section("main-content")

    <section class="py-5">
        <div class="container">
            <div class="col-md-9 mx-auto">
                <div class="card shadow-lg">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset($product->image) }}" alt="" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-8 bg-light">
                            <div class="card-body ">
                                <div>
                                    <small>{{ $product->category->name }}</small> .
                                    <small>{{ $product->brand->name }}</small>
                                </div>
                                <h4>{{ $product->name }}</h4>
                                <h1>{{ $product->price }}</h1>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
