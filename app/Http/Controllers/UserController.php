<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function index($id)
    {
            return User::findOrFail($id);

    }*/

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
          $user = User::findOrFail($id);

    if ($user->id != Auth::id()) {
        return response()->json([
            'message' => 'غير مسموح'
        ], 403);
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email'
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email
    ]);

    return $user;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
    public function posts(int $id)
{
    return Post::where('user_id', $id)
        ->latest()
        ->get();
}
}

