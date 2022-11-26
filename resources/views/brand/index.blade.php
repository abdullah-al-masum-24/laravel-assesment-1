@extends("master")

@section("title")
    Brands
@endsection

@section("main-content")

    <section class="py-5">
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
                                            <small><a href="{{ route("category.product", ["id" => $product->category_id]) }}">{{ $product->category->name }}</a></small>
                                            <span class="mx-1">|</span>
                                            <small><a href="{{ route("brand.product", ["id" => $product->brand_id]) }}">{{ $product->brand->name }}</a></small>
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
