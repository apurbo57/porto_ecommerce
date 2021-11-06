@extends('backend.components.layout');
@section('title')
    Edit Brand
@endsection

@section('content')
    <!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Forms</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-clipboard'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
								</ol>
							</nav>
						</div>
					</div>
					@if (session('message'))
						<div class="alert alert-{{ session('type') }}">{{ session('message') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
						</div>
					@endif
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Brand Inputs</h4>
							</div>
							<hr/>
                            <form action="{{route('staff.brand.update',$brand->id)}}" method="post">
                                @csrf
                                @method('PUT')
							<div class="form-group">
                                <label for="brand" class="text-md">Brand Name</label>
								<input id="brand" name="name" class="form-control form-control-lg" type="text" value="{{$brand->name}}">
							</div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="acive" name="status" value="active" {{ ($brand->status=="active")? "checked" : "" }} class="custom-control-input">
                                <label class="custom-control-label" for="acive">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="inacive" name="status" value="inactive" {{ ($brand->status=="inactive")? "checked" : "" }} class="custom-control-input">
                                <label class="custom-control-label" for="inacive">Inactive</label>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Update Brand</button>
                        </form>
						</div>
					</div>
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
@endsection