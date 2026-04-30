<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use app\Models\Save;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SaveController extends Controller
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
            'post_id' => 'required|exists:posts,id',
        ]);

        $save = Save::firstOrCreate([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
        ]);

        return response()->json($save, 201);
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
        $save = Save::where('user_id', Auth::id())->where('post_id', $id)->first();

        if ($save) {
            $save->delete();
            return response()->json(null, 204);
        }

        return response()->json(['message' => 'Save not found'], 404);
    }
}
