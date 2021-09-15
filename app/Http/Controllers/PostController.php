<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Session;

class PostController extends Controller
{

    // public function __construct(){

    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts  = Post::orderBy('id' , 'desc')->paginate(5);

        return view('posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create' , compact('categories' , 'tags'));
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

            'title'         => 'required|max:255',
            'slug'          => 'required|alpha_dash|min:5|max:255',
            'body'          =>   'required',
            'category_id'   =>   'required|integer'
        ]);

        $post = new Post();

        $post->title           =  $request->title;   
        $post->slug            =  $request->slug;    
        $post->category_id     =  $request->category_id;    
        $post->body            =  $request->body;    

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success' , 'the blog post was successfuly save!');

        return redirect()->route('posts.show' , $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
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
        $tags = Tag::all();

        $categories = Category::all();

        // $cats = array();
        // foreach($categories as $category){
        //     $cats[$category->id] = $category->name;
        // }

        $post = Post::findOrFail($id);
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
        $post = Post::findOrfail($id);

        if($request->input('slug') == $post->slug){
            $request->validate([

                'title'     =>  'required|max:255',
                'body'      =>  'required',
            ]);
        }else{
            $request->validate([

                'title'         => 'required|max:255',
                'slug'          => 'required|alpha_dash|min:5|max:255',
                'body'          =>   'required',
                'category_id'   =>   'required|integer'
            ]);
        }

        $post = Post::findOrfail($id);

        $post->title           =  $request->title;   
        $post->slug            =  $request->slug;    
        $post->category_id     =  $request->category_id;    
        $post->body            =  $request->body;    

        $post->save();

        if($request->tags){
            $post->tags()->sync($request->tags);

        }else{
            $post->tags()->sync(array());
        }


        Session::flash('success' , 'this post was Successfuly Updated');

        return redirect()->route('posts.show' , $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach(); 
        $post->delete();

        Session::flash('success' , 'this post was Deleted post!');

        return redirect()->route('posts.index' );

    }
}
