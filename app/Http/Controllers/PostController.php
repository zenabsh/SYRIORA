<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $location=$request->query('location');
        $category=$request->query('category_id');

            $query= Post::with('user')
            ->withCount('comments')
            ->whereHas('status' , function ($st) {
                $st->where('name','approved');
            })
            ->latest();

            if($location){
                $query->where('location' , $location);


            }
            if($category){
                $query->where('category_id',$category);
            }
            return $query->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = $request->file('image')->store('posts');

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'required_amount' => 'required|numeric|min:1'
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'required_amount' => $request->required_amount,
            'image' => $imagePath,
            'user_id' => Auth::id()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'required_amount' => 'required|numeric|min:1'
        ]);

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'required_amount' => $request->required_amount
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $post = Post::findOrFail($id);

    if ($post->user_id != Auth::id()) {
        return response()->json(['message' => 'غير مسموح'], 403);
    }

    if ($post->donations()->count() > 0) {
        return response()->json([
            'message' => 'لا يمكن حذف حملة تحتوي على تبرعات'
        ], 400);
    }

    $post->delete();

    return response()->json([
        'message' => 'تم حذف البوست'
    ]);
    }
}
