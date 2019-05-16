<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\controllers\controller;
use App\Post;
use App\Category;
use Session;
use App\Tag;
use Image;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::orderBy('id', 'desc')->paginate(4);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $this->validate($request, array(

            'title'          => 'required | max:255',

            'slug'           => 'required | alpha_dash | min:5 | max:255 | unique:posts,slug',

            'category_id'    => 'required|integer',

            'body'           => 'required',

            'featured_image' => 'sometimes|image'

        ));

        $post = new post;

        $post->title        = $request->title;

        $post->slug         = $request->slug;

        $post->category_id  = $request->category_id;

        $post->body         = $request->body;

        if ($request->hasFile('featured_image')) {
           $image = $request->file('featured_image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/' . $filename);
           Image::make($image)->resize(800, 400)->save($location);

           $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post was successfully save!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);

        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);

        $categories = category::all();

        $tags = Tag::all(); 


        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post = post::find($id);



         $this->validate($request, array(
            'title'       => 'required | max:255',
            'slug'        => "required | alpha_dash | min:5 | max:255 | unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'body'        => 'required',
            'featured_image' => 'image'
        ));
            
         $post = post::find($id);
         $post->title = $request->input('title');
         $post->slug  = $request->input('slug');
         $post->category_id  = $request->input('category_id');
         $post->body  = $request->input('body');

         if ($request->hasFile('featured_image')) {
           $image = $request->file('featured_image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('images/' . $filename);
           Image::make($image)->resize(800, 400)->save($location);

           $oldFilename = $post->image;

           $post->image = $filename;

           Storage::delete($oldFilename);
         }

         $post->save();

         if(isset($request->tags)){

         $post->tags()->sync($request->tags);

        }else{
                $post->tags()->sync(array());
        }

         Session::flash('success', 'This Post Was successfully Saved.');

         return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);

        $post->tag()->datach();

        Storage::delete($post->image);

        $post->delete();

        Session::flash('success','The Post Successfully Deleted.');

        return redirect()->route('posts.index');
    }

    public function __construct(){

        $this->middleware('auth');

    }
}
