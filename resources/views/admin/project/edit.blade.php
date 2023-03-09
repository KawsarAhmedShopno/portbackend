@extends('admin.admin')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
<div class="content-body" style="min-height: 788px;">
			<div class="container-fluid">
			<div class="row">

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Project </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

        <form method="post" action="{{ route('project.update',[$project->id]) }}" enctype="multipart/form-data">
        	@csrf
            {{ method_field('PUT') }}
               <div class="form-group">
                <label class="info-title">project name </label>
         <input type="text" name="project_name" class="form-control input-default " value="{{$project->project_name}}" >
            @error('project_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
         <div class="form-group">
            <label class="info-title">project description </label>
         <textarea class="form-control" name='project_description' rows="4" id="comment">{{$project-> 	project_description}} </textarea>
       
          @error('project_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
               
             <div class="form-group">
                <label class="info-title">live preview </label>
         <input type="text" name="live_preview" class="form-control input-default "value="{{$project->live_preview }}"   >
            @error('live_preview')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
        
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                 <span class="input-group-text">image</span>
                </div>
                <div class="custom-file">
        <input type="file" name="img" class="custom-file-input" id="image">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
           


            <div class="form-group">
               <img id="showImage" src="{{ asset($project->img ) }}"class="img-fluid rounded-circle" alt="" style="width: 100px; height: 100px;">


</div>
            
     


   



           <input type="submit" class="btn btn-secondary" value="Update">
            
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

    <script type="text/javascript">
	 $(document).ready(function(){
	 	$('#image').change(function(e){
	 		var reader = new FileReader();
	 		reader.onload = function(e){
	 			$('#showImage').attr('src',e.target.result);
	 		}
	 		reader.readAsDataURL(e.target.files['0']);
	 	});
	 });   
</script>     
@endsection