<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $comments, $comment;

    public function index() {
        $this->comments = Comment::all();
        return view("comment.manage", ["comments" => $this->comments]);
    }

    public function create(Request $request,$id) {

        Comment::store($request, $id);

    //  return redirect("product/detail/".$id);
        return Redirect::route("product.detail", ["id" => $id]);
    }

    public function update($id) {

        Comment::statusUpdate($id);

        return redirect("comment/manage")->with("message", "Comment updated with successfully !!");
    }

    public function delete($id) {

        $this->comment = Comment::find($id);
        $this->comment->delete();

        return redirect("comment/manage")->with("message", "Comment deleted with successfully !!");
    }
}
