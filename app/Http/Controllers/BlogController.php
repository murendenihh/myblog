<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Support\Facades\DB;

use App\Post;

use App\Comment;

class BlogController extends Controller
{
    //
    public function blog(){
        
        $posts = Post::orderBy('created_at','DESC')->simplePaginate(5);
        
        $latest_posts = Post::orderBy('created_at','DESC')->take(3)->get();
        
        return view('blog.welcome', compact('posts','latest_posts'));
    }
    
    public function full_blog($id){
        
        $post = Post::findOrFail($id);
          
        return view('blog.show',['post' => $post]);
        
    }
    
    public function store_comment(Request $request){
        
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255',
            'comment' => 'required',
        ]);
        
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->name = $request->name;
        $comment->message = $request->comment;
        $comment->status = "pending";
        $comment->email = $request->email;
        
        $comment->save();
        
       return redirect()->route('blog.full_blog', ['id' => $request->post_id])->with('success','Comment submitted successfully');
               
                        
     }
    
    
}
