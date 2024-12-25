<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salestable;
use App\Models\Salesproduct;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        return redirect('homePage');
        
    }
   
    public function print($id)
    {
        
        $b=Salestable::where('uid',$id)->first();
        $bs=Salesproduct::where('id_bill',$id)->get();

      
        // $di=DiscountsTable::first();
        
        return view('bill',['main'=>$b,'sub'=>$bs]);
    }
}
