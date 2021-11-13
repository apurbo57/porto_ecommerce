@extends('backend.components.layout');
@section('title')
    Add Post
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
									<li class="breadcrumb-item active" aria-current="page">Add Post</li>
								</ol>
							</nav>
						</div>
					</div>
					<x-showMessage></x-showMessage>
					<!--end breadcrumb-->
					<div class="row">
						<div class="col-12 col-lg-12">
							<div class="card border-lg-top-primary">
								<div class="card-body p-5">
									<div class="card-title d-flex align-items-center">
										<h4 class="mb-0 text-primary">Product Add Form</h4>
									</div>
									<hr>
									<form class="product-create" action="{{route('staff.product.store')}}" method="post">
										@csrf
									<div class="form-body">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label>Product Name</label>
												<div class="input-group">
													<input type="text" class="form-control border-left-0" placeholder="Last Name">
												</div>
											</div>
											<div class="form-group col-md-6">
												<label>Slug</label>
												<div class="input-group">
													<input type="text" class="form-control border-left-0" placeholder="Last Name">
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label>Category Name</label>
												<div class="input-group">
													<select name="category_id" class="form-control" id="select_cat">
														<option value="">-- Select Your Category --</option>
														@foreach ($categories as $category)
															<option value="{{ $category->id }}">{{ $category->name }}</option>
															@if (count($category->subCategory))
																@foreach($category->subcategory as $sub)
																	<option value="{{ $sub->id }}">{{ $category->name }} > {{ $sub->name }}</option>
																	@if (count($sub->subCategory))
																	@foreach($sub->subcategory as $sub2)
																	<option value="{{ $sub2->id }}">{{ $category->name }} > {{ $sub->name }} > {{ $sub2->name }}</option>
																	@endforeach
																	@endif
																@endforeach
															@endif
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Brand Name</label>
												<div class="input-group">
													<select name="brand_id" class="form-control" id="select_cat">
														<option value="">-- Select Your Brand --</option>
														<option value="0">No Brand</option>
														@foreach ($brands as $brand)
															<option value="{{ $brand->id }}">{{ $brand->name }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Model</label>
												<div class="input-group">
													<input type="text" class="form-control border-left-0" placeholder="Last Name">
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label>Buying Price</label>
												<div class="input-group">
													<input type="number" class="form-control border-left-0" placeholder="Last Name">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Selling Price</label>
												<div class="input-group">
													<input type="text" class="form-control border-left-0" placeholder="Last Name">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Special Price</label>
												<div class="input-group">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" id="yes_sp" name="warranty" value="1" class="custom-control-input">
														<label class="custom-control-label" for="yes_sp">Yes</label>
													</div>
												</div>
											</div>
										</div>
										<div class="form-row special_details">
											<div class="form-group col-md-4">
												<label>Special Price</label>
												<div class="input-group">
													<input type="number" class="form-control border-left-0" placeholder="Last Name">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Special Price Start</label>
												<div class="input-group">
													<input type="date" class="form-control border-left-0" placeholder="Last Name">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Special Price End</label>
												<div class="input-group">
													<input type="date" class="form-control border-left-0" placeholder="Last Name">
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label>Quantity</label>
												<div class="input-group">
													<input type="number" class="form-control border-left-0" placeholder="Last Name">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Sku Code</label>
												<div class="input-group">
													<input type="text" class="form-control border-left-0" placeholder="Last Name">
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>Warranty</label>
												<div class="input-group">
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" id="yes" name="warranty" value="1" class="custom-control-input">
														<label class="custom-control-label" for="yes">Yes</label>
													</div>
												</div>
											</div>
										</div>
										<div class="form-row wrrantyshow">
											<div class="form-group col-md-12">
												<label>Warranty Duration</label>
												<div class="input-group">
													<input type="text" class="form-control border-left-0" placeholder="Phone No">
												</div>
											</div>
											<div class="form-group col-md-12">
												<label>Warranty Condition</label>
												<div class="input-group">
													<textarea name="" class="form-control editor" id="" cols="30" rows="10"></textarea>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label>Color</label>
												<div class="input-group">
													@foreach (color() as $key=>$value)
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" id="color{{$value}}" name="color[]" value="{{$key}}" class="custom-control-input">
														<label class="custom-control-label" for="color{{$value}}">{{$value}}</label>
													</div>
													@endforeach
												</div>
											</div>
											<div class="form-group col-md-6">
												<label>Size</label>
												<div class="input-group">
													@foreach (size() as $key=>$value)
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" id="size{{$value}}" name="size[]" value="{{$key}}" class="custom-control-input">
														<label class="custom-control-label" for="size{{$value}}">{{$value}}</label>
													</div>
													@endforeach
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label>Thambnail</label>
												<div class="input-group">
													<input type="file" class="form-control border-left-0" placeholder="Phone No">
												</div>
											</div>
											<div class="form-group col-md-6">
												<label>Product Gallery</label>
												<div class="input-group">
													<input type="file" class="form-control border-left-0" placeholder="Phone No">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control editor" placeholder="Please Enter Your Description" rows="3" cols="3"></textarea>
										</div>
										<div class="form-group row">
											<div class="col-md-12 text-center">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="acive" name="status" value="active" class="custom-control-input">
													<label class="custom-control-label" for="acive">Active</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="inacive" name="status" value="inactive" class="custom-control-input">
													<label class="custom-control-label" for="inacive">Inactive</label>
												</div>
											</div>
										</div>
										<button type="submit" class="btn btn-primary float-right">Add Post</button>
									</div>
									</form>
									</div>
								</div>
							</div>
						</div>
					<!--end row-->
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){

        $(".special_details").hide();
		$("#yes_sp").click(function() {
			$(".special_details").slideToggle();
		});

        $(".wrrantyshow").hide();
		$("#yes").click(function() {
			if($(this).is(":checked")) {
				$(".wrrantyshow").show(300);
			} else {
				$(".wrrantyshow").hide(200);
			}
		});
    });
</script>
@endsection