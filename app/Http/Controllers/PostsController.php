<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts  = Posts::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostsRequest $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'user_id' => 'required|exists:users,id'
        // ]);

        // Create post
        Posts::create($request->validated());

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        return view('posts.edit', compact( 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostsRequest $request, Posts $posts)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'user_id' => 'required|exists:users,id'
        // ]);
        $posts->update($request->validated());

        return redirect()->route('posts.index')->with('success', 'Organisation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        $posts->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
