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
						<div class="col-12 col-lg-9 mx-auto">
							<div class="card radius-15">
								<div class="card-body">
									<div class="card-title">
										<h4 class="mb-0">Post Inputs</h4>
									</div>
									<hr/>
									<form class="product-create" action="{{route('staff.product.store')}}" method="post">
										@csrf
									<div class="form-body">
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Product Name</label>
											<div class="col-sm-9">
												<input name="name" class="form-control form-control-lg" type="text" placeholder="Insert Your Product name...">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="select_cat">Brand Name</label>
											<div class="col-sm-9">
												<select name="brand_id" class="form-control" id="select_cat">
													<option value="">-- Select Your Brand --</option>
													<option value="0">No Brand</option>
													@foreach ($brands as $brand)
														<option value="{{ $brand->id }}">{{ $brand->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="select_cat">Category Name</label>
											<div class="col-sm-9">
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
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Model</label>
											<div class="col-sm-9">
												<input name="model" class="form-control form-control-lg" type="text" placeholder="Insert Your Model...">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Buying Price</label>
											<div class="col-sm-9">
												<input name="buying_price" class="form-control form-control-lg" type="number" placeholder="Buying Price">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Selling Price</label>
											<div class="col-sm-9">
												<input name="selling_price" class="form-control form-control-lg" type="number" placeholder="Selling Price">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Special Price</label>
											<div class="col-sm-9">
												<input name="special_price" class="form-control form-control-lg" type="number" placeholder="Special Price">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Special Price From</label>
											<div class="col-sm-9">
												<input name="special_price_from" class="form-control form-control-lg" type="date">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Special Price To</label>
											<div class="col-sm-9">
												<input name="special_price_to" class="form-control form-control-lg" type="date">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Quantity</label>
											<div class="col-sm-9">
												<input name="quantity" class="form-control form-control-lg" type="number" placeholder="Quantity">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Sku Code</label>
											<div class="col-sm-9">
												<input name="sku_code" class="form-control form-control-lg" type="text" placeholder="Insert Your Sku Code...">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Color</label>
											<div class="col-sm-9">
												<input name="color" class="form-control form-control-lg" type="text" placeholder="Insert Your Color...">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Size</label>
											<div class="col-sm-9">
												<input name="size" class="form-control form-control-lg" type="text" placeholder="Insert Your size...">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Thumbnail</label>
											<div class="col-sm-9">
												<input name="thambnail" class="form-control form-control-lg" type="file">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Images</label>
											<div class="col-sm-9">
												<input name="images" class="form-control form-control-lg" type="file">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Warranty</label>
											<div class="col-sm-9">
												<div class="custom-control custom-checkbox custom-control-inline">
													<input type="checkbox" id="yes" name="warranty" value="1" class="custom-control-input">
													<label class="custom-control-label" for="yes">Yes</label>
												</div>
												<div class="custom-control custom-checkbox custom-control-inline">
													<input type="checkbox" id="no" name="warranty" value="0" class="custom-control-input">
													<label class="custom-control-label" for="no">No</label>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Warranty Duration</label>
											<div class="col-sm-9">
												<input name="wrarranty_duration" class="form-control form-control-lg" type="text" placeholder="Insert Your Warranty Duration...">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Warranty Condition</label>
											<div class="col-sm-9">
												<input name="wrarranty_condition" class="form-control form-control-lg" type="text" placeholder="Insert Your Warranty Condition...">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Description</label>
											<div class="col-sm-9">
												<input name="description" class="form-control form-control-lg" type="text" placeholder="Insert Your Description...">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Status</label>
											<div class="col-sm-9">
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