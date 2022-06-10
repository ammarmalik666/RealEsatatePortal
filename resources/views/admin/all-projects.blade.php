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
				<li class="breadcrumb-item">Home</li>
				<li class="breadcrumb-item"><a href="javascript:void(0);">Projects</a></li>
			</ol>
		</div>
	</div>
	<div class="row clients-contacts-main">
		<div class="col-md-12 col-xl-12">
			@if($errors->any())
                @if($errors->first() == 'project_created')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> <strong>Success!</strong> Project created successfully.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
				@elseif($errors->first() == 'project_updated')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> <strong>Success!</strong> Project updated successfully.
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
								<input type="text" class="form-control" placeholder="Search Projects.....">
								<button class="btn ripple btn-primary text-white input-group-text border-0" type="button">Search</button>
							</div>
						</div>
						<div class="col-xl offset-lg-6 col-lg-2 col-md-12 me-auto">
							<div class="btn-list">
								<a href="/admin/add-project" class="btn btn-primary">
									<svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
									Add Project
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="card cart">
					<div class="card-header border-bottom">
						<h3 class="card-title">All Projects</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered border-bottom text-nowrap">
								<thead>
									<tr class="border-top">
										<th class="w-15">Project</th>
										<th class="w-5">Project Name</th>
										<th class="w-15">Property Name</th>
										<th class="w-10">Status</th>
										<th class="w-10">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($projects as $project)
										<tr>
											<td>
												@if ($project->pictures == "" || $project->pictures == NULL)
													<img src="/admin/assets/images/properties/none.jpg" alt="" class="cart-img">
												@else
													<img src="/admin/assets/images/pngs/1.png" alt="" class="cart-img">
												@endif
												
											</td>
											<td>{{ $project->name }}</td>
											<td>
												{{ $project['property'][0]->name }}
											</td>
											<td >
												@if ($project->project_status == "planning")
													<span class="badge bg-info">Planning</span>
												@elseif($project->project_status == "in_process")
													<span class="badge bg-warning">In Process</span>
												@elseif($project->project_status == "completed")
													<span class="badge bg-primary">Completed</span>
												@endif
											</td>
											<td>
												<a href="/admin/project/{{ $project->slug }}/details" class="btn btn-primary-light btn-square br-50 m-1"><i class="fe fe-eye fs-13"></i></a>
												<a href="/admin/project/{{ $project->slug }}/edit" class="btn btn-info-light btn-square br-50 m-1"><i class="fa fa-pencil fs-13"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="float-end">
							<ul class="pagination ">
								<li class="page-item page-prev disabled">
									<a class="page-link" href="#" tabindex="-1">Prev</a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item page-next">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('extra_js')

@endsection