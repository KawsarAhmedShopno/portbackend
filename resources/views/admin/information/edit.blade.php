@extends('admin.admin')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
<div class="content-body" style="min-height: 788px;">
			<div class="container-fluid">
			<div class="row">

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Information </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

        <form method="post" action="{{ route('information.update',[$info->id]) }}"enctype="multipart/form-data">
        	@csrf
            {{ method_field('PUT') }}
      
            <div class="form-group">
            <label class="info-title">introduction  </label>
         <textarea class="form-control" name='introduction' rows="4" id="comment">{{$info->introduction}}</textarea>
       
          @error('introduction ')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
            <div class="form-group">
            <label class="info-title">fblink </label>
         <input class="form-control" name='fb' value="{{$info->fb}}" >
       
          @error('fb')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
            <div class="form-group">
            <label class="info-title">gitlink </label>
         <input class="form-control" name='git' value="{{$info->git}}" >
       
          @error('git')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
            <div class="form-group">
            <label class="info-title">tech  </label>
         <textarea class="form-control" name='tech' rows="4" id="comment">{{$info->tech}}</textarea>
       
          @error('tech')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
            <div class="form-group">
            <label class="info-title">aboutMe</label>
         <textarea class="form-control" name='aboutMe' rows="4" id="comment">{{$info->aboutMe}}</textarea>
       
          @error('aboutMe')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
            <div class="form-group">
            <label class="info-title">aboutCaption</label>
         <textarea class="form-control" name='aboutCaption' rows="4" id="comment">{{$info->aboutCaption}}</textarea>
       
          @error('aboutCaption')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
        
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                 <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
        <input type="file" name="aboutImg" class="custom-file-input" id="image">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>


            <div class="form-group">
               <img id="showImage"  src="{{ asset($info->aboutImg) }}" class="img-fluid rounded-circle" alt="" style="width: 100px; height: 100px;">
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