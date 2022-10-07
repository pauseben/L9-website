<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::All();
      
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PostCategory::All();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'slug' => 'required|unique:posts',
            'image' => 'required'
        ], [
            'title.required' => 'Cím mező kötelező!',
            'content.required' => 'Tartalom mező kötelező!',
            'status.required' => 'Státusz mező kötelező!',
            'slug.required' => 'Slug mező kötelező!',
            'slug.unique' => 'Ilyen slug már szerepel az adatbázisban!',
            'image.required' => 'Kép feltöltés kötelező!',
        ]);
      
        $input = $request->all();

        
        Post::create($input);
        activity()
                ->event('create')
                ->log('Bejegyzés létrehozása');
        return redirect()->route('posts.index')
                        ->with('success','Bejegyzés sikeresen létrehozva');
             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->get();
        if($post->isNotEmpty()){
            return view('posts.show')->with('post', $post); 
        }else{
            abort(404);
        }
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = PostCategory::All();
        return view('posts.edit',compact('post','categories'));
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
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            
        ]);
      
        $input = $request->all();

        if (request('image')) {
            $post->image = request('image');
        }

        $post->update($input);
        activity()
                ->event('update')
                ->withProperties(['id' => $post->id])
                ->log('Bejegyzés szerkesztése');
        return redirect()->back()->with('success','Bejegyzés sikeresen frissítve');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        activity()
                ->event('delete')
                ->withProperties(['id' => $post->id])
                ->log('Bejegyzés törlése');
        $post->delete();
       
        return redirect()->route('posts.index')
                        ->with('success','Bejegyzés törölve');
    }

   /**
    * It returns the view of the blog page.
    * 
    * @return A view called blog.blade.php
    */
    public function blog(){

        $posts = Post::where('status','=',1)->paginate(6);
        return view('posts.blog',compact('posts'));
    }

    

}
