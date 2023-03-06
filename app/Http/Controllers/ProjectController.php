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
        'project_features'=> 'required' ,
        'live_preview'=> 'required' ,
        'img_one'=> 'required' ,
        'img_two'=> 'required' 
       ]);
    
       $image=$request->file('img_one');
       $filename=hexdec(uniqid()).'.'.$image->getClientOriginalName();
       $image->move(public_path('upload/images/'),$filename);
       $url='http://127.0.0.1:8000/upload/images/'.$filename;
        $image1=$request->file('img_two');
       $filename1=hexdec(uniqid()).'.'.$image1->getClientOriginalName();
       $image1->move(public_path('upload/images/'),$filename1);
       $url1='http://127.0.0.1:8000/upload/images/'.$filename1;
  $data['project_name'] = $request->project_name;
  $data['project_description'] = $request->project_description;
   $data['project_features'] = $request->project_features;
    $data['live_preview'] = $request->live_preview;
  $data['img_one'] = $url;
  $data['img_two'] = $url1;
       Project::create($data);

 

 return redirect()->route('project.index');
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
       if ($request->file('img_one')){    $image=$request->file('img_one');
       $filename=hexdec(uniqid()).'.'.$image->getClientOriginalName();
       $image->move(public_path('upload/images/'),$filename);
       $url='http://127.0.0.1:8000/upload/images/'.$filename;
        $image1=$request->file('img_two');
       $filename1=hexdec(uniqid()).'.'.$image1->getClientOriginalName();
       $image1->move(public_path('upload/images/'),$filename1);
       $url1='http://127.0.0.1:8000/upload/images/'.$filename1;
  $data['project_name'] = $request->project_name;
  $data['project_description'] = $request->project_description;
   $data['project_features'] = $request->project_features;
    $data['live_preview'] = $request->live_preview;
  $data['img_one'] = $url;
  $data['img_two'] = $url1;
        $service= Project::find($id);
        $service->update($data);
         return redirect()->route('project.index');
    }
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
        
         return redirect()->route('project.index');
    }
}
