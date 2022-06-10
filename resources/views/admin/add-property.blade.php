@extends('admin.includes.layout')
@section('extra_css')
    
@endsection
@section('content')
<div class="main-container container-fluid">
	<div class="page-header">
		<div>
			<h1 class="page-title">Properties</h1>
		</div>
		<div class="ms-auto pageheader-btn">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Properties</a></li>
				<li class="breadcrumb-item active" aria-current="page">Add Property</li>
			</ol>
		</div>
	</div>
	<div class="row row-sm">
		<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
			@if($errors->any())
                @if($errors->first() == 'property_created')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> <strong>Success!</strong> Property added successfully.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @elseif($errors->first() == 'property_not_created')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Error!</strong> Property not added. Please Check your internet connection and try again.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @elseif($errors->first() == 'unknownError')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Error!</strong> Property not added. Please Check your internet connection and try again.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @endif
            @endif
			<div class="card box-shadow-0">
				<div class="card-header border-bottom">
					<h4 class="card-title">Add Property Details</h4>
				</div>
				<div class="card-body">
					<form action="{{ route('add.property') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Name of the Property</label>
									<input type="text" class="form-control" placeholder="Enter property name here" required name="name" value="{{ old('name') }}">
									@error('name')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Address</label>
									<input type="text" class="form-control" placeholder="Enter property address here" required name="address" value="{{ old('address') }}">
									@error('address')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>City</label>
									<input type="text" class="form-control" placeholder="Enter city here" name="city" value="{{ old('city') }}">
									@error('city')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>State</label>
									<input type="text" class="form-control" placeholder="Enter state here"  name="state" value="{{ old('state') }}">
									@error('state')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Zip</label>
									<input type="text" class="form-control" placeholder="Enter zipcode here"  name="zip" value="{{ old('zip') }}">
									@error('zip')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Number of Bedrooms</label>
									<input type="number" class="form-control" placeholder="Enter number of bedrooms here" required name="bedrooms" value="{{ old('bedrooms') }}">
									@error('bedrooms')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Number of Bathrooms</label>
									<input type="number" class="form-control" placeholder="Enter number of bathrooms here" required name="bathrooms" value="{{ old('bathrooms') }}">
									@error('bathrooms')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Square footage of home</label>
									<input type="number" class="form-control" placeholder="Enter square footage of home here" required name="square_footage" value="{{ old('square_footage') }}">
									@error('square_footage')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Total lot acreage</label>
									<input type="number" class="form-control" placeholder="Enter total lot acreage here" required name="lot_acreage" value="{{ old('lot_acreage') }}">
									@error('lot_acreage')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Number of cars in garage</label>
									<input type="number" class="form-control" placeholder="Enter number of cars in garage here" required name="cars_in_garage" value="{{ old('cars_in_garage') }}">
									@error('cars_in_garage')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Date Acquired</label>
									<input type="date" class="form-control" placeholder="Enter date acquired" name="date_acquired" value="{{ old('date_acquired') }}">
									@error('date_acquired')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Acquisition Price</label>
									<input type="number" class="form-control" placeholder="Enter acquisition price here" name="acquisition_price" value="{{ old('acquisition_price') }}">
									@error('acquisition_price')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Date Completed</label>
									<input type="date" class="form-control" name="date_completed" value="{{ old('date_completed') }}">
									@error('date_completed')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>AVR (After Renovation Value)</label>
									<input type="number" class="form-control" placeholder="Enter after renovation value here" required name="after_renovation_value" value="{{ old('after_renovation_value') }}">
									@error('after_renovation_value')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Sale Date</label>
									<input type="date" class="form-control" name="sale_date" value="{{ old('sale_date') }}">
									@error('sale_date')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Sale Price</label>
									<input type="number" class="form-control" placeholder="Enter sale price here" required name="sale_price" value="{{ old('sale_price') }}">
									@error('sale_price')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control form-select" name="property_status">
										<option selected disabled>Select Status</option>
										<option value="negotiating_purchase">Negotiating Purchase</option>
										<option value="planning_renovation">Planning Renovation</option>
										<option value="renovation_in_process">Renovation In Process</option>
										<option value="renovation_completed">Renovation Completed</option>
										<option value="sold">Sold</option>
									</select>
									@error('property_status')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary mt-3">Add Property</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('extra_js')
<script src="/admin/assets/plugins/select2/select2.full.min.js"></script>
<script src="/admin/assets/js/formelementadvnced.js"></script>
@endsection