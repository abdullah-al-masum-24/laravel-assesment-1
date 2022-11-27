@extends("master")

@section("title")
    Categories
@endsection

@section("main-content")

    <section class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                @if($products->isNotEmpty())
                    @foreach($products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card shadow-lg h-100">
                                <img src="{{ asset($product->image) }}" alt="" class="card-img-top h-75"/>
                                <div class="card-body">
                                    <div class="card-title"></div>
                                    <div class="card-text">
                                        <div>
                                            <span class="badge text-bg-secondary"><a href="{{ route("category.product", ["id" => $product->category_id]) }}" class="text-white text-capitalize">{{ $product->category->name }}</a></span>
                                            <span class="mx-1 text-muted">|</span>
                                            <span class="badge text-bg-primary"><a href="{{ route("brand.product", ["id" => $product->brand_id]) }}" class="text-white text-capitalize">{{ $product->brand->name }}</a></span>
                                        </div>
                                        <h4 class="mt-2 fw-bold text-capitalize">{{ $product->name }}</h4>
                                        <div><span>&dollar;</span><span>{{ $product->price }}</span></div>
                                        <hr/>
                                        <a href="{{ route("product.detail", $product->id) }}" class="text-success">Product Detail &rightarrow;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 notify text-center text-primary fw-bold p-5 display-3">
                        No Product
                    </div>
                @endif

            </div>
        </div>
    </section>

@endsection
