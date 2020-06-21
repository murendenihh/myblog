<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Category;

class CategoryController extends Controller
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
        $cat = Category::orderBy('created_at','DESC')->simplePaginate(5);
        
        return view('category.index',['cat' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
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
     $request->validate([
    'category_name' => ['required', 'unique:categories', 'max:255']
    
   ]);
        $user =  auth()->user();
      // print($user->id);
        //create new category
       $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = $user->id;
        
        $category->save();
        
      return redirect('/categories')->with('status', 'Category added successfully!');
        
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
    public function destroy(Category $category)
    {
        //
       // dd($id);
         $category->delete();
  return redirect()->route('categories.index');
    }
}
