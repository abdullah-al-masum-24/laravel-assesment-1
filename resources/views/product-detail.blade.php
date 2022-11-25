@extends("master")

@section("title")
    Home
@endsection

@section("main-content")

    <section class="py-5">
        <div class="container">
            <div class="col-md-9 mx-auto">
                <div class="card">
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

                                <div class="row mt-4 mb-3 mt-5">
                                    <div class="col-md-12 mx-auto">
                                        <div class="card">
                                            <div class="card-header">Write Your Comment</div>
                                            <div class="card-body">
                                                <form action="{{ route("comment.create", ["id" => $product->id]) }}" method="post">
                                                    @csrf
                                                    <label for="">Name</label>
                                                    <input type="text" class="form-control mb-2" name="name"/>
                                                    <textarea name="comment" id="" cols="30" rows="5" class="form-control text-muted text-sm mb-3"  placeholder="Comment Here .. "></textarea>
                                                    <input type="submit" class="btn btn-dark w-25 float-end" value="Submit"/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">All Comment</div>
                                            <div class="card-body">
                                                <table class="table  table-hover">

                                                    @if($comments->isNotEmpty())
                                                        @foreach($comments as $comment)

                                                                <tr class="">
                                                                    <td class="pb-3">
                                                                        <div class="bg-light w-100 p-1">
                                                                            <div class="text-muted text-capitalize float-start me-2">{{ $comment->name }} -</div>
                                                                            <div class="text-muted text-right ">{{ $comment->created_at }}</div>
                                                                            <p class="text-right text-capitalize">{{ $comment->comment }}</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
