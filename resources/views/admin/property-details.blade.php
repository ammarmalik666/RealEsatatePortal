@extends('admin.includes.layout')
@section('extra_css')
    
@endsection
@section('content')
<div class="main-container container-fluid">
	<div class="page-header">
		<div>
			<h1 class="page-title">Property</h1>
		</div>
		<div class="ms-auto pageheader-btn">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Property</li>
				<li class="breadcrumb-item"><a href="javascript:void(0);">Property Details</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			@if($errors->any())
                @if($errors->first() == 'property_updated')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Success!</strong> Property details updated successfully. 
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @elseif($errors->first() == 'unknownError')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Error!</strong> Error. Please Check your internet connection and try again.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @endif
            @endif
			<div class="card productdesc">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-primary">
								<div class="row">
									<div class="col-6">
										<h4 class="mb-5 mt-3">Details</h4>
									</div>
									<div class="col-6">
										<div class="btn-list mb-2" style="float:right!important;">
											<a href="admin/property/{{ $property[0]->slug }}/edit" class=" mx-1 btn btn-primary">
												Edit Details
											</a>
											<a href="admin/property/{{ $property[0]->slug }}/update/pictures" class=" mx-1 btn btn-primary">
												Edit Pictures
											</a>
										</div>
									</div>
								</div>
								<ul class="list-unstyled mb-0">
									<li class="row">
										<div class="col-sm-3 text-muted">
											Name of the Property
										</div>
										<div class="col-sm-9">
											{{ $property[0]->name }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											Address
										</div>
										<div class="col-sm-9">
											{{ $property[0]->address }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											City
										</div>
										<div class="col-sm-9">
											{{ $property[0]->city }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											State
										</div>
										<div class="col-sm-9">
											{{ $property[0]->state }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											Zip
										</div>
										<div class="col-sm-9">
											{{ $property[0]->zip }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											Number of Bedrooms
										</div>
										<div class="col-sm-9">
											{{ $property[0]->bedrooms }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											Number of Bathrooms
										</div>
										<div class="col-sm-9">
											{{ $property[0]->bathrooms }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											Square footage of home
										</div>
										<div class="col-sm-9">
											{{ $property[0]->square_footage }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											Total lot acreage
										</div>
										<div class="col-sm-9">
											{{ $property[0]->lot_acreage }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											Number of cars in garage
										</div>
										<div class="col-sm-9">
											{{ $property[0]->cars_in_garage }}
										</div>
									</li>
									<li class=" row">
										<div class="col-sm-3 text-muted">
											Date Acquired
										</div>
										<div class="col-sm-9">
											@if ($property[0]->date_acquired == "" || $property[0]->date_acquired == null)
												-
											@else
												{{ $property[0]->date_acquired }}
											@endif
										</div>
									</li>
									<li class="p-b-20 row">
										<div class="col-sm-3 text-muted">
											Acquisition Price
										</div>
										<div class="col-sm-9">
											@if ($property[0]->acquisition_price == "" || $property[0]->acquisition_price == null)
												-
											@else
												{{ $property[0]->acquisition_price }}
											@endif
										</div>
									</li>
									<li class="p-b-20 row">
										<div class="col-sm-3 text-muted">
											Date Completed
										</div>
										<div class="col-sm-9">
											@if ($property[0]->date_completed == "" || $property[0]->date_completed == null)
												-
											@else
												{{ $property[0]->date_completed }}
											@endif
											
										</div>
									</li>
									<li class="p-b-20 row">
										<div class="col-sm-3 text-muted">
											AVR (After Renovation Value)
										</div>
										<div class="col-sm-9">
											@if ($property[0]->after_renovation_value == "" || $property[0]->after_renovation_value == null)
												-
											@else
												{{ $property[0]->after_renovation_value }}
											@endif
										</div>
									</li>
									<li class="p-b-20 row">
										<div class="col-sm-3 text-muted">
											Sale Date
										</div>
										<div class="col-sm-9">
											@if ($property[0]->sale_date == "" || $property[0]->sale_date == null)
												-
											@else
												{{ $property[0]->sale_date }}
											@endif
										</div>
									</li>
									<li class="p-b-20 row">
										<div class="col-sm-3 text-muted">
											Sale Price
										</div>
										<div class="col-sm-9">
											@if ($property[0]->sale_price == "" || $property[0]->sale_price == null)
												-
											@else
												{{ $property[0]->sale_price }}
											@endif
										</div>
									</li>
									<li class="p-b-20 row">
										<div class="col-sm-3 text-muted">
											Status
										</div>
										<div class="col-sm-9">
											@if ($property[0]->property_status == "negotiating_purchase")
												<span class="badge bg-info">Negotiating Purchase</span>
											@elseif($property[0]->property_status == "planning_renovation")
												<span class="badge bg-info">Planning Renovation</span>
											@elseif($property[0]->property_status == "renovation_in_process")
												<span class="badge bg-info">Renovation In Process</span>
											@elseif($property[0]->property_status == "renovation_completed")
												<span class="badge bg-info">Renovation Completed</span>
											@elseif($property[0]->property_status == "sold")
												<span class="badge bg-danger">Sold</span>
											@else
												-
											@endif
										</div>
									</li>
								</ul>
								<div class="clearfix"></div>
								<h4 class="mb-5 mt-3">Property Pictures</h4>
								<div class="row">
									@foreach($property[0]->pictures as $obj)
										<div class="col-md-3">
											<img src="uploads/properties/{{$obj}}" class="img-fluid" />
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- <div class="modal fade"  id="ban-investor">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h4 class="modal-title">Ban Investor</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to ban <b class="text-danger">{{ $property[0]->username }}</b> ?</p>
			</div>
			<div class="modal-footer">
				<form action="{{ route('ban.investor') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $property[0]->id }}">
					<button class="btn btn-danger" type="submit">Yes Ban</button>
				</form>
				<button class="btn btn-light" data-bs-dismiss="modal" >Cancel</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade"  id="active-investor">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h4 class="modal-title">Activate Investor</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to activate <b class="text-success">{{ $property[0]->username }}</b> ?</p>
			</div>
			<div class="modal-footer">
				<form action="{{ route('active.investor') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $property[0]->id }}">
					<button class="btn btn-success" type="submit">Yes Activate</button>
				</form>
				<button class="btn btn-light" data-bs-dismiss="modal" >Cancel</button>
			</div>
		</div>
	</div>
</div> --}}
@endsection
@section('extra_js')

@endsection