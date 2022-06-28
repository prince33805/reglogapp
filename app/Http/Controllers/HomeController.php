<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    //
    function index(){
        $users = User::all();
        $city = DB::table('users')->select('city')->distinct()->get();
        return view('home',compact('users','city'));
    }

    function regpage(){
        return view('regpage');
    }

    // function loginpage(){
    //     return view('login');
    // }

    function register(Request $request){

        // Carbon::parse($request->date_of_birth)->diff(Carbon::now())->y;

        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'gender' => 'required',
            'age' => 'required',
            'image' => 'required',
            
        ]);
               
        $user = User::create(request(['firstname','lastname', 'email', 'password','gender','age','image',]));

        return back()->with('message', 'Registration Successful');
        
    }

    function search(Request $request){
        // $users = User::all();
        $searchText=$request->get('search');
        $city = DB::table('users')->select('city')->distinct()->get();
        
        // dd($searchText);
        $users = User::where('firstname','LIKE',"%$searchText%")
        ->orwhere('lastname','LIKE',"%$searchText%")
        ->orWhere('email','LIKE',"%$searchText%")
        ->orWhere('gender','LIKE',"%$searchText%")
        ->orWhere('city','LIKE',"%$searchText%")->get(); 
        return view('home',compact('users','city'));
    }
    
    function login(){
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->with('loginmessage', 'The email or password is incorrect, please try again');
        }
        return redirect()->to('/');
    } 

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }

    function city($city){
        $users = User::where('city','=',$city)->get();
        $city = DB::table('users')->select('city')->distinct()->get();
        return view('home',compact('users','city'));
    }

    function user($id){
        $user=User::find($id);
        return view('user',compact('user'));
    }
    
}
