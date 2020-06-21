<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Post;

class CommentController extends Controller
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
        //approve comments
        $approve = Comment::where('status','approved')->simplePaginate(5);
        
        //dis approve comments
        $disapprove = Comment::where('status','pending')->orderBy('created_at','DESC')->simplePaginate(5);
        
        return view('comment.index', compact('approve','disapprove'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $status = "";
        $status_approve = "approved";
        $status_disapprove = "pending";
        
        $comment = Comment::findOrFail($id);
        if($comment->status == "pending"){
            
            $comment->status = $status_approve;
            $status = "Comment approved successfully.";
            
        }else{
             $comment->status = $status_disapprove;
              $status = "Comment dis-approved successfully.";
        }
        $comment->save();
        
        return redirect('/comments')->with('status',$status);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
