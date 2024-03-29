<?php

namespace App\Http\Controllers\User;

use App\Events\SomeonePostedEvent;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user) {
        $data=$request->validate([
            'body'=>'required',
        ]);
        auth()->user()->posts()->create([
            'body'=>$data['body']
        ]);
        event(new SomeonePostedEvent($user, auth()->user()));
        return back();
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        if((auth()->user()->id != $post->user_id) && (!auth()->user()->is_friends_with($post->user_id))) {
            return back()->withErrors(['message' => 'You do not have permission to delete this post!']);
        }
        if((auth()->user()->id != $post->user_id) && (auth()->user()->id != $post->parent_id)) {
            return back()->withErrors(['message' => 'You do not have permission to delete this post!']);
        }
        if((auth()->user()->id != $post->user_id) && (auth()->user()->id = $post->parent_id)) {
            $post->delete();
            return back();
        }
        if((auth()->user()->id = $post->user_id)) {
            $post->delete();
            return back();
        }
}
}