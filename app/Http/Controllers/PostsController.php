<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostsResource;
use App\Models\Post;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return PostsResource::collection(
            Post::orderBy('created_at', 'desc')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->validated($request->all());
        $fields = [
            'user_id' => Auth::user()->id,
            'post' => $request->post
        ];
        if($request->media) {
            $file_name = time().'_'.$request->media->getClientOriginalName();
            $file_path = $request->file('media')->storeAs('uploads', $file_name, 'public');
            $fields['filePath'] = '/storage/' . $file_path;
            $fields['mediaType'] = $request->media->extension();
        }
        //return response()->json($fields);
        $post = Post::create($fields);

        return new PostsResource($post);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return new PostsResource($post);
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
