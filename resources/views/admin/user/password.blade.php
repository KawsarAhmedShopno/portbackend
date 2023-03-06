@extends('admin.admin')

@section('admin')   
<div class="content-body" style="min-height: 788px;">
			<div class="container-fluid">
			
                <div class="row">

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">update password </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

        <form method="post" action="{{ route('user.updatepass') }}" enctype="multipart/form-data">
        	@csrf
            
            <div class="form-group">
                <label class="info-title"> old password </label>
         <input type="password"id="current_password" name="oldpassword" class="form-control input-default " >
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
            <div class="form-group">
                <label class="info-title"> new password </label>
         <input type="password" name=" password" class="form-control input-default "  >
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
            <div class="form-group">
                <label class="info-title"> retype password </label>
         <input type="password" name="password_confirmation" class="form-control input-default "  >
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>
           <input type="submit" class="btn btn-secondary" value="update password">
            
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