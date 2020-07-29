<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    
    public function about()
    {
        return view('about');
    }
    
    public function services()
    {
        $services = ["Service 1","Service 2","Service 3"];
        
        return view('services', ["services" => $services]);
    }
}
