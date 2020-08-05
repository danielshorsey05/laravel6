<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function index()
    {
        $customers = \App\Customer::all();
        
        return view("customer.index", ["customers"=>$customers]);
    }
    
    public function create()
    {
         return view("customer.create");
    }
    
    public function store()
    {
        request()->validate([
            "name"=>"required",
            "email"=>"required|email"
        ]);
        
        $customers = new \App\Customer();
        
        $customers->name = request("name");
        $customers->email = request("email");
        $customers->save();   
        
        return redirect("/customers");
    }
}
