@extends("master")

@section("title")
    Product Detail
@endsection

@section("main-content")

    <section class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset($product->image) }}" alt="" class="img-fluid rounded-start h-100">
                                    </div>
                                    <div class="col-md-8 bg-light">
                                        <div class="card-body ">
                                            <h4 class="fw-bold text-primary text-capitalize">{{ $product->name }}</h4>
                                            <h4>{{ $product->title }}</h4>
                                            <p class="text-muted">{{ $product->description }}</p>
                                            <div>
                                                <span class="badge text-bg-secondary">Category: <a href="{{ route("category.product", ["id" => $product->category_id]) }}" class="text-white ms-2 text-capitalize">{{ $product->category->name }}</a></span>
                                                <span class="mx-1">|</span>
                                                <span class="badge text-bg-primary">Brand: <a href="{{ route("brand.product", ["id" => $product->brand_id]) }}" class="text-white ms-2 text-capitalize">{{ $product->brand->name }}</a></span>
                                            </div>
                                            <div class="mt-3 position-relative"><span class="position-absolute fw-bold" style="font-size: 19px;">&dollar;</span> <span class="text-danger" style="font-size: 27px; margin-left: 13px;">{{ $product->price }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3 mt-5">
                        <div class="col-md-12 mx-auto">
                            <div class="card">
                                <div class="card-header">Write Your Comment</div>
                                <div class="card-body">
                                    <form action="{{ route("comment.create", ["id" => $product->id]) }}" method="post">
                                        @csrf
                                        <label for="">Name</label>
                                        <input type="text" class="form-control mb-2" name="name" required/>
                                        <textarea required name="comment" id="" cols="30" rows="5" class="form-control text-muted text-sm mb-3"  placeholder="Comment Here .. "></textarea>
                                        <input type="submit" class="btn btn-dark w-25 float-end" value="Submit"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card">
                                <div class="card-header">All Comment</div>
                                <div class="card-body">
                                    <table class="table  table-hover">

                                        @if($comments->isNotEmpty())
                                            @foreach($comments as $comment)

                                                <tr class="">
                                                    <td class="pb-3">
                                                        <div class="bg-light w-100 p-1">
                                                            <div class="row">
                                                                <div class="col-1 text-center pt-2" style="font-size: 30px;"><i class="fa-regular fa-message"></i></div>
                                                                <div class="col-11">
                                                                    <div class="text-primary fw-bold text-capitalize float-start me-2 ">{{ $comment->name }} -</div>
                                                                    <div class="text-muted text-right " >{{ $comment->created_at }}</div>
                                                                    <p class="text-right text-dark text-capitalize">{{ $comment->comment }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        @else
                                            <tr>
                                                <td><h4 class="text-success">No Comment Founded For This Product</h4></td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($relatedProducts->count() == 1)

                    @foreach($relatedProducts as $relatedProduct)
                        @if($product->id != $relatedProduct->id )
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">Related Product</div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-12">
                                                <a href="{{ route("product.detail", ["id" => $relatedProduct->id]) }}" class="nav-link">
                                                    <div class="card h-100">
                                                        <img src="{{asset($relatedProduct->image)}}" alt="" class="card-img-top h-75"/>
                                                        <div class="card-body">
                                                            <div class="card-title">{{  $relatedProduct->name }}</div>
                                                            <div class="mt-3 position-relative"><span class="position-absolute fw-bold" style="font-size: 19px;">&dollar;</span> <span class="text-danger" style="font-size: 27px; margin-left: 13px;">{{ $relatedProduct->price }}</span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                @elseif($relatedProducts->count() > 1)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">Related Products</div>
                            <div class="card-body">

                                @foreach($relatedProducts as $relatedProduct)
                                    @if($product->id != $relatedProduct->id)

                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <a href="{{ route("product.detail", ["id" => $relatedProduct->id]) }}" class="nav-link">
                                                    <div class="card h-100">
                                                        <img src="{{asset($relatedProduct->image)}}" alt="" class="card-img-top h-75"/>
                                                        <div class="card-body">
                                                            <div class="card-title fw-bold text-primary">{{  $relatedProduct->name }}</div>
                                                            <div class="mt-3 position-relative"><span class="position-absolute fw-bold" style="font-size: 19px;">&dollar;</span> <span class="text-danger" style="font-size: 27px; margin-left: 13px;">{{ $relatedProduct->price }}</span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    @endif

                                @endforeach

                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

@endsection
