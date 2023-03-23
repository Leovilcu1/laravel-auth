<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

//helpers
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view("admin.posts.index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage. 
     *
     * @param  \App\Http\Requests\StorePostRequest  $request 
     * @return \Illuminate\Http\Response 
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $slug = Str::slug($data["title"]);


        $newPost = Post::create([
            "title"=>$data["title"],
            "slug"=>$slug,
            "content"=>$data["content"],
        ]);
        return redirect()->route("admin.posts.show",$newPost)->with("success" , "post aggiunto con successo!");
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) 
    {
        return view("admin.posts.show" ,compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.posts.edit" ,compact("post"));
        
    } 
 
    /** 
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $slug = Str::slug($data["title"]);


        $post->update([
            "title"=>$data["title"],
            "slug"=>$slug,
            "content"=>$data["content"],
        ]);
        return redirect()->route("admin.posts.show",$post->id)->with("success" , "post aggiornato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response 
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("admin.posts.index")->with("success" , "post eliminato con successo!");
    }
}
