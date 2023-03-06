@extends('admin.admin')

@section('admin')  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
<div class="content-body" style="min-height: 788px;">
			<div class="container-fluid">
			<div class="row">

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Profile </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

        <form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">
        	@csrf
            
            <div class="form-group">
                <label class="info-title"> Name </label>
         <input type="text" name="name" class="form-control input-default " value="{{$user->name}}" >
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
            <div class="form-group">
                <label class="info-title">Email </label>
         <input type="email" name="email" class="form-control input-default " value="{{$user->email}}"  >
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
     


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                 <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
        <input type="file" name="profile_photo_path" class="custom-file-input" id="image">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>


            <div class="form-group">
               <img id="showImage" src="{{(!empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload//no_image.jpg')}}" class="img-fluid rounded-circle" alt="" style="width: 100px; height: 100px;">
            </div>




           <input type="submit" class="btn btn-secondary" value="Edit profile">
            
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