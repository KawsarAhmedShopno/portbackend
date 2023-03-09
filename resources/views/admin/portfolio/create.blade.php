@extends('admin.admin')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
<div class="content-body" style="min-height: 788px;">
			<div class="container-fluid">
			<div class="row">

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">create portfolio </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

       <form method="post" action="{{ route('portfolio.store') }}" enctype="multipart/form-data">
        	@csrf
            
           
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                 <span class="input-group-text">frontend </span>
                </div>
                <div class="custom-file">
        <input type="file" name="frontend" class="custom-file-input" id="image">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                 <span class="input-group-text">backend</span>
                </div>
                <div class="custom-file">
        <input type="file" name="backend" class="custom-file-input" id="image">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                 <span class="input-group-text">maintainance</span>
                </div>
                <div class="custom-file">
        <input type="file" name="maintainance" class="custom-file-input" id="image">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
        
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                 <span class="input-group-text"> 	webdesign</span>
                </div>
                <div class="custom-file">
        <input type="file" name="webdesign" class="custom-file-input" id="image">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>


            


        
            
     


   




           <input type="submit" class="btn btn-secondary" value="create">
            
        </form>
    </div>
                            </div>
                        </div>
					</div>


					  




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   
@endsection