<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $project=Project::latest()->get();
        return view('admin.project.index',compact('project'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $validdata=$request->validate([
        'project_name'=> 'required' ,
        'project_description'=> 'required' ,
     
        'live_preview'=> 'required' ,
        'img'=> 'required' ,
       
       ]);
    
       $image=$request->file('img');
       $filename=hexdec(uniqid()).'.'.$image->getClientOriginalName();
       $image->move(public_path('upload/images/'),$filename);
       $url='http://127.0.0.1:8000/upload/images/'.$filename;
       
  $data['project_name'] = $request->project_name;
  $data['project_description'] = $request->project_description;

    $data['live_preview'] = $request->live_preview;
  $data['img'] = $url;

       Project::create($data);

 
       $notification = array(
        'message' => 'Project Created Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('project.index')->with($notification);
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
        $project = Project::find($id);
        return view('admin.project.edit', compact('project'));
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
       if ($request->file('img')){    $image=$request->file('img');
       $filename=hexdec(uniqid()).'.'.$image->getClientOriginalName();
       $image->move(public_path('upload/images/'),$filename);
       $url='http://127.0.0.1:8000/upload/images/'.$filename;
       $data['img'] = $url;}
  $data['project_name'] = $request->project_name;
  $data['project_description'] = $request->project_description;
   
    $data['live_preview'] = $request->live_preview;

       
        $service= Project::find($id);
        $service->update($data);
        $notification = array(
            'message' => 'Project Updated Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('project.index')->with($notification);
       
    }
       
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $project = Project::find($id);
    
        $project->delete();
        $notification = array(
            'message' => 'Project Updated Successfully',
            'alert-type' => 'warning'
        );
    
        return redirect()->route('project.index')->with($notification);
    }
}
