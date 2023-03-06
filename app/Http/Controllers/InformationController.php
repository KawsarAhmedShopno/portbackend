<?php

namespace App\Http\Controllers;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $info=Information::latest()->get();
        return view('admin.information.index',compact('info'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $validdata=$request->validate([
        'about'=> 'required' ,
        'refund'=> 'required' ,
        'terms'=> 'required' ,
        'privacy'=> 'required' ,
        'who'=> 'required' ,
        'vission'=> 'required' ,
        'mission'=> 'required' ,
        'company'=> 'required' ,
       ]);
               
  $data = $request->all();
        Information::create($data);

 return redirect()->route('information.index');
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
        $info = Information::find($id);
        return view('admin.information.edit', compact('info'));
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
             $data = $request->all();
        $info = Information::find($id);
        $info->update($data);
         return redirect()->route('information.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $info = Information::find($id);
        $info->delete();
         return redirect()->route('information.index');
    }
}
