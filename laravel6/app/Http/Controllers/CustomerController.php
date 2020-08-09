<?php

namespace App\Http\Controllers;

use \App\Customer;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    
    public function index(Request $request)
    {
        $customers = Customer::where("active",$request->query("active", 1))->get();
        return view("customer.index", ["customers"=>$customers]);
    }
    
    public function create()
    {
        $customer = new Customer();

        return view("customer.create",["customer"=>$customer]);
    }
    
    public function store()
    {
        $this->_validate(); //Validate form
        
        $customer = new Customer();
        $customer->name = request("name");
        $customer->email = request("email");
        $customer->save();   
        
        Mail::to($customer->email)->send(new WelcomeMail());
        
        return redirect("/customers/".$customer->id);
    }
    
    public function show($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        
        return view("customer.show", ["customer"=>$customer]);
    }
    
    
    public function edit($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        
        return view("customer.edit", ["customer"=>$customer]);
    }
    
    
    public function update($customer_id)
    {
        $this->_validate(); //Validate form
        
        $customer = Customer::findOrFail($customer_id);
        $customer->name = request("name");
        $customer->email = request("email");
        $customer->save();   
        
        return redirect("/customers");
    }
    
    
    public function destroy($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $customer->delete();
        return redirect("/customers");  
    }
    
    
    private function _validate()
    {
        request()->validate([
            "name"=>"required",
            "email"=>"required|email"
        ]);
    }
    
}
