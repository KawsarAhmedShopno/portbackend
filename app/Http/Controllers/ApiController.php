<?php

namespace App\Http\Controllers;
use App\Models\Chart;
use App\Models\Client;
use App\Models\Course;
use App\Models\Footer;
use App\Models\Information;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use App\Models\HomePage;
use App\Models\Contact;

use Illuminate\Http\Request;

class ApiController extends Controller
{
     public function allSelectChart(){
        $result=Chart::all();
        return $result;
    }
      public function allSelectClient(){
        $result=Client::all();
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
            return 1;
        }else{
            return 0;
        }

    }
      public function allSelectCourse(){
        $result=Course::all();
        return $result;
    }
    public function Selectid($courseId){
        $result=Course::all();
        return $result;
    }
     public function allSelectFooter(){
        $result=Footer::all();
        return $result;
    }
    public function titleSelect(){
        $home=HomePage::select('home_title','home_subtitle')->get();
        return $home;
    }
    public function  techdesSelect(){
        $home=Homepage::select('tech_description')->get();
        return $home;
    }
    public function  summarySelect(){
        $home=HomePage::select('total_student','total_course','total_review')->get();
        return $home;
    }
    public function videoSelect(){
        $home=HomePage::select('video_url','video_description')->get();
        return $home;
    }
     public function allSelectInformation(){
        $result=Information::all();
        return $result;
    }
    public function aboutSelect(){
        $result=Information::select('about')->get();;
        return $result;
    }
     public function allSelectProject(){
        $home=Project::all();
        return $home;
    }
    public function SelectidProject($projectId){
        $home=Project::find($projectId);
        return $home;
    }
     public function allSelectService(){
        $result=Service::all();
        return $result;
    }
}
