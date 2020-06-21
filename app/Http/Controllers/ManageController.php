<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ManageController extends Controller
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
    
    public function index(){
        $login_user = auth()->user();
        
        $users = User::where([
                ['status', '=',''],
                ['id','!=',$login_user->id]
                ])->simplePaginate(5);
        
        return view('manage.index',['users' => $users ]);
               
        
    }
    
    public function destroy($id){
        
        $users = User::findOrFail($id);
        $users->status = "1";
        
        $users->save();
        
        return redirect('/manage')->with('status','Admin deleted successfully ');
        
    }
}
