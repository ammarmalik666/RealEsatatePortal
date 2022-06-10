@extends('admin.includes.layout')
@section('extra_css')
    
@endsection
@section('content')
<div class="main-container container-fluid">
	<div class="page-header">
		<div>
			<h1 class="page-title">Projects</h1>
		</div>
		<div class="ms-auto pageheader-btn">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Projects</li>
				<li class="breadcrumb-item"><a href="javascript:void(0);">Project Details</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			@if($errors->any())
                @if($errors->first() == 'project_updated')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Success!</strong> Project details updated successfully. 
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
											<a href="admin/project/{{ $project[0]->slug }}/edit" class=" mx-1 btn btn-primary">
												Edit Details
											</a>
											<a href="admin/project/{{ $project[0]->slug }}/update/pictures" class=" mx-1 btn btn-primary">
												Edit Pictures
											</a>
										</div>
									</div>
								</div>
								<ul class="list-unstyled mb-0">
									<li class="row">
										<div class="col-sm-3 text-muted">
											Name of the Project
										</div>
										<div class="col-sm-9">
											{{ $project[0]->name }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											Project Property
										</div>
										<div class="col-sm-9">
											{{ $project[0]['property'][0]->name }}
										</div>
									</li>
									<li class="row">
										<div class="col-sm-3 text-muted">
											Project Status
										</div>
										<div class="col-sm-9">
											@if ($project[0]->project_status == "planning")
												<span class="badge bg-info">Planning</span>
											@elseif($project[0]->project_status == "in_process")
												<span class="badge bg-warning">In Process</span>
											@elseif($project[0]->project_status == "completed")
												<span class="badge bg-primary">Completed</span>
											@else
												-
											@endif
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
{{-- <div class="modal fade"  id="ban-investor">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h4 class="modal-title">Ban Investor</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to ban <b class="text-danger">{{ $project[0]->username }}</b> ?</p>
			</div>
			<div class="modal-footer">
				<form action="{{ route('ban.investor') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $project[0]->id }}">
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
				<p>Are you sure you want to activate <b class="text-success">{{ $project[0]->username }}</b> ?</p>
			</div>
			<div class="modal-footer">
				<form action="{{ route('active.investor') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $project[0]->id }}">
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