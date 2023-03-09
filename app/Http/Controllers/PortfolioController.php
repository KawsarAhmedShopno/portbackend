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
            'introduction'=> 'required' ,
            'tech'=> 'required' ,
            'aboutMe'=> 'required' ,
            'aboutCaption'=> 'required' ,
            'aboutImg'=> 'required' 
        ]);
                   
        $image=$request->file('aboutImg');
        $filename=hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $image->move(public_path('upload/images/'),$filename);
        $url='http://127.0.0.1:8000/upload/images/'.$filename;
    $data['introduction'] = $request->introduction;
    $data['tech'] = $request->tech;
    $data['aboutMe'] = $request->aboutMe;
    $data['aboutCaption'] = $request->aboutCaption;
    $data['aboutImg'] = $url;
    Portfolio::create($data);
            $notification = array(
                'message' => 'information Created Successfully',
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
        {  $validdata=$request->validate([
            'introduction'=> 'required' ,
            'tech'=> 'required' ,
            'aboutMe'=> 'required' ,
            'aboutCaption'=> 'required' ,
            'aboutImg'=> 'required' 
        ]);
                   
        if ($image=$request->file('aboutImg')){$image=$request->file('aboutImg');
        $filename=hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $image->move(public_path('upload/images/'),$filename);
        $url='http://127.0.0.1:8000/upload/images/'.$filename;
    $data['introduction'] = $request->introduction;
    $data['tech'] = $request->tech;
    $data['aboutMe'] = $request->aboutMe;
    $data['aboutCaption'] = $request->aboutCaption;
    $data['aboutImg'] = $url;
        }
        $port= Portfolio::find($id);
        $port->update($data);
            $notification = array(
                'message' => 'information Updated Successfully',
                'alert-type' => 'success'
            );
     return redirect()->route('portfolio.index')->with($notification);
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
                'message' => 'Information Deleted Successfully',
                'alert-type' => 'warning'
            );
             return redirect()->route('portfolio.index')->with($notification);
        }
}
