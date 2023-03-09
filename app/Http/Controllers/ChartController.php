<?php

namespace App\Http\Controllers;
use App\Models\Chart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $chart=Chart::latest()->get();
        return view('admin.chart.index',compact('chart'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $validdata=$request->validate([
        'technology'=> 'required' ,
        'percent'=> 'required' 
        
       ]);
               
  $data = $request->all();
       Chart::create($data);
       $notification = array(
        'message' => 'Chart Created Successfully',
        'alert-type' => 'success'
    );

 return redirect()->route('chart.index')->with($notification);
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
        $chart= Chart::find($id);
        return view('admin.chart.edit', compact('chart'));
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
        $info = Chart::find($id);
        $info->update($data);
        $notification = array(
            'message' => 'Chart Updated Successfully',
            'alert-type' => 'success'
        );
    
     return redirect()->route('chart.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $info = Chart::find($id);
        $info->delete();
        $notification = array(
            'message' => 'Chart Deleted Successfully',
            'alert-type' => 'warning'
        );
    
     return redirect()->route('chart.index')->with($notification);
    }
}
