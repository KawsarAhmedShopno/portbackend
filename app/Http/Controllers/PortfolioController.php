<?php

namespace App\Http\Controllers;
use App\Models\Portfolio;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            
            $port=Portfolio::latest()->get();
            return view('admin.portfolio.index',compact('port'));
        }
        
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('admin.portfolio.create');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {  $validdata=$request->validate([
          
            'frontend'=> 'required' ,
            'backend'=> 'required' ,
            'maintainance'=> 'required'  
           
            
        ]);
                   

    
        $image1=$request->file('frontend');
        $filename1=hexdec(uniqid()).'.'.$image1->getClientOriginalName();
        $image1->move(public_path('upload/images/'),$filename1);
        $url1='http://127.0.0.1:8000/upload/images/'.$filename1;
        $image2=$request->file('backend');
        $filename2=hexdec(uniqid()).'.'.$image2->getClientOriginalName();
        $image2->move(public_path('upload/images/'),$filename2);
        $url2='http://127.0.0.1:8000/upload/images/'.$filename2;
        $image3=$request->file('maintainance');
        $filename3=hexdec(uniqid()).'.'.$image3->getClientOriginalName();
        $image3->move(public_path('upload/images/'),$filename3);
        $url3='http://127.0.0.1:8000/upload/images/'.$filename3;
      
   
    $data['frontend'] = $url1;
    $data['backend'] = $url2;
    $data['maintainance'] = $url3;
    Portfolio::create($data);
            $notification = array(
                'message' => 'portfolio Created Successfully',
                'alert-type' => 'success'
            );
     return redirect()->route('portfolio.index')->with($notification);
          
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $port = Portfolio::find($id);
            return view('admin.portfolio.edit', compact('port'));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        { 
                   
            $port=Portfolio::latest()->get();
            return view('admin.portfolio.index',compact('port'));
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
             $port = Portfolio::find($id);
            $port->delete();
            $notification = array(
                'message' => 'portfilio Deleted Successfully',
                'alert-type' => 'warning'
            );
             return redirect()->route('portfolio.index')->with($notification);
        }
}
