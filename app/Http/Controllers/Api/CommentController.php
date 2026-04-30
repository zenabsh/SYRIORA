<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use app\Models\Comment;
use app\Models\Post;
use app\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);

        return response()->json($comment, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = Comment::where('user_id', Auth::id())->where('id', $id)->first();

        if ($comment) {
            $comment->update([
                'content' => $request->content,
            ]);
            return response()->json($comment, 200);
        }

        return response()->json(['message' => 'Comment not found'], 404);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::where('user_id', Auth::id())->where('id', $id)->first();

        if ($comment) {
            $comment->delete();
            return response()->json(null, 204);
        }

        return response()->json(['message' => 'Comment deleted'], 404);

    }
}
