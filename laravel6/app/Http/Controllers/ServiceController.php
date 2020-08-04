<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = \App\Service::all();
        
        return view('service.index', ["services" => $services]);
    }
    
    
    public function store()
    {
        request()->validate([
            "name"=>"required|min:5"
        ]);
        
        $service = new \App\Service();
        
        $service->name = request("name");
        $service->save();   
        
        return redirect()->back();
    }
}
