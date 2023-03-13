<?php

namespace App\Http\Controllers;
use App\Models\Chart;
use App\Models\Portfolio;
use App\Models\Information;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;

use App\Models\Contact;

use Illuminate\Http\Request;

class ApiController extends Controller
{
     public function allSelectChart(){
        $result=Chart::all();
        return $result;
    }
   
    public function create(Request $request) {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'message' => 'required|string'
            ]);
    
            $contact = Contact::create($data);
    
            return response()->json([
                'success' => true,
                'message' => 'Message sent'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating contact: ' . $e->getMessage()
            ], 500);
        }
    }
   
   
    public function allContact(){
        $result=Contact::all();
        return $result;
    }
  
  
 
  
     public function allSelectInformation(){
        $result=Information::all();
        return $result;
    }
    public function projectSelect(){
        $result=project::all();;
        return $result;
    }
     public function allSelectPortfolio(){
        $home=Portfolio::all();
        return $home;
    }
   
     public function allSelectService(){
        $result=Service::all();
        return $result;
    }
}
