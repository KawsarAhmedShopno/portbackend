@extends('admin.admin')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
<div class="content-body" style="min-height: 788px;">
			<div class="container-fluid">
			<div class="row">

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Chart </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

       <form method="post" action="{{ route('chart.store') }}" enctype="multipart/form-data">
        	@csrf
            
           
                <div class="form-group">
                <label class="info-title">	technology </label>
         <input type="text" name="technology" class="form-control input-default "  >
            @error('technology')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
        
         <div class="form-group">
                <label class="info-title">	percent </label>
         <input type="text" name="percent" class="form-control input-default "  >
            @error('percent')
            <span class="text-danger">{{ $message }}</span>
            @enderror

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