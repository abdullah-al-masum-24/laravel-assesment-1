@extends("master")

@section("title")
    manage
@endsection

@section("main-content")
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-header">Manage Comment</div>
                        <div class="card-body">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>User Name</th>
                                        <th>Comment</th>
                                        <th>Product Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($comments as $comment)
                                        <tr>
                                            <th>{{ $comment->id }}</th>
                                            <td>{{ $comment->name }}</td>
                                            <td>{{ $comment->comment }}</td>
                                            <td>{{ $comment->product->name }}</td>
                                            <td>
                                                @if ($comment->status == 0 )
                                                   <span class='badge text-bg-primary'>Publish</span>
                                                @else
                                                    <span class='badge text-bg-success'>Published</span>
                                                @endif
                                            </td>
                                            <td>
                                                <nav class="navbar navbar-expand">
                                                    <ul class="navbar-nav">
                                                        <li class="dropdown">
                                                            <a href="" class="nav-link badge text-bg-secondary" data-bs-target="#commnetDrop" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical "></i></a>
                                                            <ul id="commnetDrop" class="dropdown-menu">
                                                                <li><a href="{{ route("comment.update", ["id" => $comment->id]) }}" class="dropdown-item">{{ $comment->status == 0 ? 'Publish' : 'Unpublished' }}</a></li>
                                                                <li><a href="{{ route("comment.delete", ["id" => $comment->id]) }}" class="dropdown-item">Delete</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </nav>
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
