<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($postId)
    {
        return Expense::where('post_id', $postId)
        ->latest()
        ->get();
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
  $request->validate([
        'post_id' => 'required|exists:posts,id',
        'amount' => 'required|numeric|min:1',
        'description' => 'required|string|max:500',
        'proof_file' => 'required|image'
    ]);

    $path = $request->file('proof_file')->store('expenses','public');

    $expense = Expense::create([
        'post_id' => $request->post_id,
        'amount' => $request->amount,
        'description' => $request->description,
        'proof_file' => $path
    ]);

    return $expense;
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense,$id)
    {
        $expense = Expense::findOrFail($id);

    $post = Post::findOrFail($expense->post_id);

    if ($post->user_id != Auth::id()) {
        return response()->json([
            'message' => 'غير مسموح'
        ], 403);
    }

    $expense->delete();

    return response()->json([
        'message' => 'تم حذف المصروف'
    ]);
    }
}
