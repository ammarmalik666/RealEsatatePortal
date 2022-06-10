@extends('admin.includes.layout')
@section('extra_css')
    
@endsection
@section('content')
<div class="main-container container-fluid">
	<div class="page-header">
		<div>
			<h1 class="page-title">Investors</h1>
		</div>
		<div class="ms-auto pageheader-btn">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Investors</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Investor</li>
			</ol>
		</div>
	</div>
	<div class="row row-sm">
		<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
			@if($errors->any())
                @if($errors->first() == 'investor_not_updated')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Error!</strong> Investor not updated. Please Check your internet connection and try again.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @elseif($errors->first() == 'unknownError')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Error!</strong> Investor not added. Please Check your internet connection and try again.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @endif
            @endif
			<div class="card box-shadow-0">
				<div class="card-header border-bottom">
					<h4 class="card-title">Add Investor Details</h4>
				</div>
				<div class="card-body">
					<p class="text-muted">It is Very Easy to Customize and it uses in your website apllication.</p>
					<form action="{{ route('update.investor') }}" method="POST">
						@csrf
						<input type="hidden" name="id" value="{{ $investor[0]->id }}">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" class="form-control" placeholder="Enter first name here" required name="first_name" value="{{ $investor[0]->first_name }}">
									@error('first_name')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" placeholder="Enter last name here" required name="last_name" value="{{ $investor[0]->last_name }}">
									@error('last_name')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Cell Phone</label>
									<input type="text" class="form-control" placeholder="Enter cell phone here" required name="cell_phone" value="{{ $investor[0]->cell_phone }}">
									@error('cell_phone')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Landline Phone</label>
									<input type="text" class="form-control" placeholder="Enter landline here" name="landline_phone" value="{{ $investor[0]->landline_phone }}">
									@error('landline_phone')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Address Line 1</label>
									<input type="text" class="form-control" placeholder="Enter address line 1 here" name="address_line_1"  value="{{ $investor[0]->address_line_1 }}">
									@error('address_line_1')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Address Line 2</label>
									<input type="text" class="form-control" placeholder="Enter address line 2 here" name="address_line_2"  value="{{ $investor[0]->address_line_2 }}">
									@error('address_line_2')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>City</label>
									<input type="text" class="form-control" placeholder="Enter city here" name="city" value="{{ $investor[0]->city }}">
									@error('city')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>State</label>
									<input type="text" class="form-control" placeholder="Enter state here"  name="state" value="{{ $investor[0]->state }}">
									@error('state')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Zip</label>
									<input type="text" class="form-control" placeholder="Enter zipcode here"  name="zip" value="{{ $investor[0]->zip }}">
									@error('zip')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Add Property</label>
									<select multiple class="form-control select2-show-search form-select" data-placeholder="Choose one" name="property[]">
										<option label="Choose one"></option>
										<option value="1">Property 1</option>
										<option value="2">Property 2</option>
										<option value="3">Property 3</option>
										<option value="4">Property 4</option>
										<option value="5">Property 5</option>
										<option value="6">Property 6</option>
										<option value="7">Property 7</option>
										<option value="8">Property 8</option>
									</select>
									@error('property')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary mt-3">Update Investor</button>
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