<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $service=Service::latest()->get();
        return view('admin.service.index',compact('service'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $validdata=$request->validate([
        'name'=> 'required' ,
        'description'=> 'required' ,
        'service_logo'=> 'required' 
        
       ]);
    
      $image=$request->file('service_logo');
       $filename=hexdec(uniqid()).'.'.$image->getClientOriginalName();
       $image->move(public_path('upload/images/'),$filename);
       $url='http://127.0.0.1:8000/upload/images/'.$filename;
  $data['service_name'] = $request->name;
  $data['service_description'] = $request->description;
  $data['service_logo'] = $url;
       Service::create($data);

 

 	$notification = array(
    		'message' => 'Service Created Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('service.index')->with($notification);
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
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
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
       if ($request->file('service_logo')){   $image=$request->file('service_logo');
       $filename=hexdec(uniqid()).'.'.$image->getClientOriginalName();
       $image->move(public_path('upload/images/'),$filename);
       $url='http://127.0.0.1:8000/upload/images/'.$filename;
       $data['service_logo'] = $url;
       }
  $data['service_name'] = $request->name;
  $data['service_description'] = $request->description;
  
        $service= Service::find($id);
        $service->update($data);
        $notification = array(
    		'message' => 'Service Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('service.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $service = Service::find($id);
    
        $service->delete();
        
        $notification = array(
    		'message' => 'Service Deleted Successfully',
    		'alert-type' => 'warning'
    	);

    	return redirect()->route('service.index')->with($notification);
    }
}
