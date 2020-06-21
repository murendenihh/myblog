<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Post;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::orderBy('created_at','DESC')->simplePaginate(5);
        return view('post.index',['post'=> $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get all categories
        $cat_list = Category::all();
        
        return view('post.create',['cat_list' => $cat_list ]);
               
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $user =  auth()->user();
         
        $request->validate([
        'title' => 'required|unique:posts|max:255',
        'post' => 'required',
        'image' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        'category' => 'required',
    ]);
        
       // $path = $request->file('image')->store('uploads');
     //   $imageName = time().'.'.request()->image->getClientOriginalExtension();
        //    request()->image->move(public_path('uploads'), $imageName);
        $imagePath = request('image')->store('uploads','public');
        $post = new Post();
        
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->category = $request->category;
        $post->image = $imagePath;
        $post->message = $request->post;
        
        $post->save();
       
        
   return redirect('/posts')->with('status', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $p = Post::findOrFail($id);
        $cat_list = Category::all();
        
        return view('post.edit', compact('p','cat_list'));
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
       
         $request->validate([
        'title' => 'required|max:255',
        'post' => 'required',
        'image' => 'image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        'category' => 'required',
    ]);
         //update
     $post = Post::findOrFail($id);
      //check if file isnot empty
     if($request->hasFile('image')) {
           //delete previous image from the storage
         
         //add new image to the storage
        $imagePath = request('image')->store('uploads','public');
        
        $post->title = $request->title;
        $post->category = $request->category;
        $post->image = $imagePath;
        $post->message = $request->post;
          
        
       }else{
        
        
        $post->title = $request->title;
        $post->category = $request->category;
       // $post->image = $imagePath;
        $post->message = $request->post;
     }
         
        $post->save();
        return redirect('/posts')->with('status', 'Post updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //

if(file_exists(public_path('storage/'.$post->image))){

      unlink(public_path('storage/'.$post->image));
       $post->delete();
    }else{

    //  dd('File does not exists.');
      return redirect('/posts')->with('status', 'Related image file do not exists in the file sysrem '.$post->image);

    }
  return redirect('/posts')->with('status', 'Post deleted sucessfully.');
    }
}
