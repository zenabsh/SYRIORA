<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use app\Models\Post;
use app\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
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
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:1000',
            'total_amount' => 'nullable|numeric|min:1',
            'require_amount' => 'nullable|numeric|min:1',
            'image' => 'nullable|image'

        ]);
          $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public');
    }
        $post=Post::create([
            'user_id' => Auth::id(),
             'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'total_amount' => 0,
            'require_amount' => $request->require_amount,
            'image' => $imagePath,
             'shared_count' => 0,
             'likes_count' => 0,
             'saved_count' => 0,
        ]);
        return response()->json( ['message' => 'Post created successfully',$post], 201);

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
    public function update(Request $request, string $id,Post $post)
    {
         if ($post->user_id !==Auth::id()) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 403);
    }
     $request->validate([
        'title' => 'sometimes|string',
        'description' => 'sometimes|string',
        'category_id' => 'sometimes|exists:categories,id',
        'required_amount' => 'sometimes|integer',
        'image' => 'sometimes|image'
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public');
        $post->image = $imagePath;
    }

    $post->update($request->only([
        'title',
        'description',
        'category_id',
        'required_amount'
    ]));

    return response()->json([
        'message' => 'Post updated successfully',
        'post' => $post
    ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Post $post)
    {
         if ($post->user_id !== Auth::id()) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 403);
    }

    $post->delete();

    return response()->json([
        'message' => 'Post deleted successfully'
    ]);
    }
}
