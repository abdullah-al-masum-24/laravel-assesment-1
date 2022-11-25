<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    private static $comments, $comment;

    public static function store($request, $id) {
        self::$comment = new Comment();
        self::$comment->name = $request->name;
        self::$comment->comment = $request->comment;
        self::$comment->status = 0;
        self::$comment->product_id = $id;
        self::$comment->save();
    }

    public static function statusUpdate($id) {
        self::$comment = Comment::find($id);
        if (self::$comment->status == 0) {
            self::$comment->status = 1;
        }
        else {
            self::$comment->status = 0;
        }

        self::$comment->save();
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
