@extends('admin.admin')

@section('admin')
<div class="content-body">
			<div class="container-fluid">
				
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your  dashboard </p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Service</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Service</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>service_name</strong></th>
                                                <th><strong>service_description</strong></th>
                                                <th><strong>service_Icon</strong></th>
                                         
                                                
                                                <th><strong>Action</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            @if(count($service)>0)
                                                
                                                @foreach($service as $service)
                                                <td><strong>01</strong></td>
                                                <td>{{$service->service_name}}</td>
                                                <td>{{$service->service_description}}</td>
                                                <td> {{ $service->service_icon }}</td>
                                               
                                                
                                               
                                                <td>
													<div class="dropdown">
														<button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
															<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="{{ route('service.edit',[$service->id]) }}">Edit</a>
															<div class="dropdown-item" >  <form action="{{ route('service.destroy',[$service->id]) }}" method="post">@csrf
                                {{method_field('DELETE')}}
                                
                                <button >
                                    Delete
                                </button>
                                
                            </form></div>
                                 
														</div>
													</div>
												</td>
                                            </tr>
											
                               @endforeach
                               @else
                    <td><strong>No data to display</strong></td>
                    @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				   
                </div>
            </div>
        </div>
        
@endsection