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
   
        public function create(Request $request){
        $contactarry=json_decode($request->getContent(),true);
        $name=$contactarry['name'];
        $email=$contactarry['email'];
        $message=$contactarry['message'];
        $result=Contact::create([
            'name'=>$name,
            'email'=>$email,
            'message'=>$message,

        ]);
        if ($result == true){
            return 'success';
        }else{
            return 'failed';
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
