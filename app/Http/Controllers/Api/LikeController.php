<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use app\Models\Like;
use app\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
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
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);

        $like = Like::firstOrCreate([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
        ]);

        return response()->json($like, 201);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $like = Like::where('user_id', Auth::id())->where('post_id', $id)->first();

        if ($like) {
            $like->delete();
            return response()->json(null, 204);
        }

        return response()->json(['message' => 'Like not found'], 404);
    }
}
