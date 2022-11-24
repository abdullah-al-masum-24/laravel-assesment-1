@extends("master")

@section("title")
    Home
@endsection

@section("main-content")

    <section class="py-5">
        <div class="container">
            <div class="row">

                @foreach($products as $product)
                <div class="col-md-3 mb-3">
                   <div class="card shadow-lg">
                       <img src="{{ asset($product->image) }}" alt="" class="card-img-top"/>
                       <div class="card-body">
                           <div class="card-title"></div>
                           <div class="card-text">
                               <div>
                                   <small>{{ $product->category->name }}</small> .
                                   <small>{{ $product->brand->name }}</small>
                               </div>
                               <h4>{{ $product->name }}</h4>
                               <h1>{{ $product->price }}</h1>
                               <p>{{ $product->description }}</p>
                               <hr/>
                               <a href="{{ route("product.detail", $product->id) }}" class="text-success">Product Detail &rightarrow;</a>
                           </div>
                       </div>
                   </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
