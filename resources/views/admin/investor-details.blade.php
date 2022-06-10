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
				<li class="breadcrumb-item">Home</li>
				<li class="breadcrumb-item"><a href="javascript:void(0);">All Investors</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			@if($errors->any())
                @if($errors->first() == 'investor_banned')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Success!</strong> Investor banned successfully.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
				@elseif($errors->first() == 'investor_active')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> <strong>Success!</strong> Investor activated successfully.
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
					<div class="row mb-5 align-items-center">
						<div class=" col-xl-2 col-lg-2 col-md-2">
							<div class="row h-100">
								<div class="col-xl-12">
									<div class="product-carousel h-100">
										@if ($investor[0]->profile_pic == "" || $investor[0]->profile_pic == NULL)
											<img alt="img" class="img-fluid w-100 d-block" src="/admin/assets/images/users/investor.png">
										@else
											<img alt="img" class="img-fluid w-100 d-block" src="/admin/assets/images/pngs/6.png">	
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-9 col-md-9">
							<h3 class="mb-2 mt-xl-0 mt-4">{{ $investor[0]->first_name }} {{ $investor[0]->last_name }}</h3>
							<p class="mb-1">
								<span class="text-dark text-18">{{ $investor[0]->username }}</span>
							</p>
							<p class="text-muted mb-0"><i class="fa fa-map-pin"></i> &nbsp; {{ $investor[0]->city }}, {{ $investor[0]->state }}</p>
							@if ($investor[0]->status == 0)
								<span class="badge bg-danger mt-2">Banned</span> &nbsp; 
								<a class="text-dark" data-bs-target="#active-investor" data-bs-toggle="modal" href="javascript:void(0)">
									<i class="fa fa-pencil"></i>
								</a>
							@elseif($investor[0]->status == 1)
								<span class="badge bg-primary mt-2">Active</span> &nbsp; <a class="text-dark" data-bs-target="#ban-investor" data-bs-toggle="modal" href="javascript:void(0)">
									<i class="fa fa-pencil"></i>
								</a>
							@endif
						</div>
					</div>

					<div class="row mt-5">
						<div class="col-md-12">
							<div class="panel panel-primary">
								<h4 class="mb-5 mt-3">Details</h4>
								<ul class="list-unstyled mb-0">
									<li class="row">
										<div class="col-sm-3 text-muted">
											Cell Phone
										</div>
										<div class="col-sm-9">
											{{ $investor[0]->cell_phone }}
										</div>
									</li>
									<li class=" row">
										<div class="col-sm-3 text-muted">
											Landline Phone
										</div>
										<div class="col-sm-9">
											@if ($investor[0]->landline_phone == "" || $investor[0]->landline_phone == null)
												-
											@else
												{{ $investor[0]->landline_phone }}
											@endif
										</div>
									</li>
									<li class="p-b-20 row">
										<div class="col-sm-3 text-muted">
											Address Line 1
										</div>
										<div class="col-sm-9">
											@if ($investor[0]->address_line_1 == "" || $investor[0]->address_line_1 == null)
												-
											@else
												{{ $investor[0]->address_line_1 }}
											@endif
										</div>
									</li>
									<li class="p-b-20 row">
										<div class="col-sm-3 text-muted">
											Address Line 2
										</div>
										<div class="col-sm-9">
											@if ($investor[0]->address_line_2 == "" || $investor[0]->address_line_2 == null)
												-
											@else
												{{ $investor[0]->address_line_2 }}
											@endif
											
										</div>
									</li>
									<li class="p-b-20 row">
										<div class="col-sm-3 text-muted">
											Zip Code
										</div>
										<div class="col-sm-9">
											@if ($investor[0]->zip == "" || $investor[0]->zip == null)
												-
											@else
												{{ $investor[0]->zip }}
											@endif
										</div>
									</li>
									<li class="p-b-20 row">
										<div class="col-sm-3 text-muted">
											Property
										</div>
										<div class="col-sm-9">
											Corner Rounded Plot
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade"  id="ban-investor">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h4 class="modal-title">Ban Investor</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to ban <b class="text-danger">{{ $investor[0]->username }}</b> ?</p>
			</div>
			<div class="modal-footer">
				<form action="{{ route('ban.investor') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $investor[0]->id }}">
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
				<p>Are you sure you want to activate <b class="text-success">{{ $investor[0]->username }}</b> ?</p>
			</div>
			<div class="modal-footer">
				<form action="{{ route('active.investor') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $investor[0]->id }}">
					<button class="btn btn-success" type="submit">Yes Activate</button>
				</form>
				<button class="btn btn-light" data-bs-dismiss="modal" >Cancel</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('extra_js')

@endsection