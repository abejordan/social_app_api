<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReactionRequest;
use App\Http\Resources\ReactionsResource;
use App\Models\Reaction;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionsController extends Controller
{
    use HttpResponses;
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
    public function store(StoreReactionRequest $request)
    {
        //
        $request->validated($request->all());
        $reaction = Reaction::create([
            "user_id" => Auth::user()->id,
            "type" => $request->type,
            "post_id" => $request->post_id
        ]);

        return new ReactionsResource($reaction);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
        //
    }
}
