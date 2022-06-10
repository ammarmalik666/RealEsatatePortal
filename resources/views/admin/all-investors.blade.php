@extends('admin.includes.layout')
@section('extra_css')
    
@endsection
@section('content')
<div class="main-container container-fluid">
	<div class="page-header">
		<div>
			<h1 class="page-title">Clients</h1>
		</div>
		<div class="ms-auto pageheader-btn">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Apps</li>
				<li class="breadcrumb-item"><a href="javascript:void(0);">Clients</a></li>
				<li class="breadcrumb-item active" aria-current="page">Clients</li>
			</ol>
		</div>
	</div>
	<div class="row clients-contacts-main">
		<div class="col-md-12 col-xl-12">
			@if($errors->any())
                @if($errors->first() == 'investor_updated')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> <strong>Success!</strong> Investor updated successfully.
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
			<div class="card">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-xl-4 col-lg-4 col-md-12 mt-1 mt-lg-0">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search in clients.....">
								<button class="btn ripple btn-primary text-white input-group-text border-0" type="button">Search</button>
							</div>
						</div>
						<div class="col-xl offset-lg-6 col-lg-2 col-md-12 me-auto">
							<div class="btn-list">
								<a href="/admin/add-investor" class="btn btn-primary">
									<svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
									Add Investor
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@foreach ($investors as $investor)
			<div class="col-lg-4 col-md-4 col-xl-4 col-sm-12">
				<div class="card mb-5">
					<div class="card-body">
						<div class="client-title mt-0">
							<figure class="rounded-circle align-self-start mb-0">
								@if ($investor->profile_pic == null || $investor->profile_pic == "")
									<img src="admin/assets/images/users/investor.png" alt="Generic placeholder image" class="avatar brround avatar-lg me-3">
								@else
									<img src="admin/assets/images/users/16.jpg" alt="Generic placeholder image" class="avatar brround avatar-lg me-3">
								@endif
							</figure>
							<div class="media-body">
								<h4 class="time-title p-0 mb-0 font-weight-semibold leading-normal"><a href="javascript:void(0)" class="text-dark">{{ $investor->first_name }}<br>{{ $investor->last_name }}</a></h4>
								<span class="text-muted">{{ $investor->city }}, {{ $investor->state }}</span>
							</div>
							<a href="/admin/investors/{{ $investor->id }}/details">
								<button class="btn btn-primary d-none d-sm-block me-2"><i class="fa fa-eye"></i> </button>
							</a>
							<a href="/admin/investors/{{ $investor->id }}/edit">
								<button class="btn btn-info d-none d-sm-block"><i class="fa fa-pencil"></i> </button>
							</a>
						</div>
						<div class="d-flex align-items-center justify-content-center mt-4">
							<div class="pe-4 border-end d-flex align-items-center justify-content-center">
								<h5 class="mb-0 me-3 text-muted">{{ $investor->username }}</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
@section('extra_js')

@endsection