@extends('admin.includes.layout')
@section('extra_css')
    
@endsection
@section('content')
<div class="main-container container-fluid">
	<div class="page-header">
		<div>
			<h1 class="page-title">Renovation Gallery</h1>
		</div>
		<div class="ms-auto pageheader-btn">
			<a href="/admin/renovation-gallery/{{ $gallery[0]->slug }}/edit" class="btn btn-primary">
				<i class="fa fa-pencil"></i>
				Edit
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			@if($errors->any())
                @if($errors->first() == 'gallery_image_updated')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Success!</strong> Gallery details updated successfully.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
				@elseif($errors->first() == 'active_gallery')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> <strong>Success!</strong> Gallery Image activated successfully.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
				@elseif($errors->first() == 'archived_gallery')
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
						<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> <strong>Success!</strong> Gallery Image archived successfully.
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
						<div class=" col-xl-5 col-lg-5 col-md-5">
							<div class="row h-100">
								<div class="col-xl-12">
									<div class="product-carousel h-100">
										@if ($gallery[0]->image == "" || $gallery[0]->image == NULL)
											<img alt="img" class="img-fluid w-100 d-block" src="/admin/assets/images/pngs/6.png">
										@else
											<img alt="img" class="img-fluid w-100 d-block" src="/uploads/renovation-gallery/{{ $gallery[0]->image }}">	
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-7 col-lg-7 col-md-7">
							<h3 class="mb-2 mt-xl-0 mt-4 align-items-center">
								{{ $gallery[0]->title }} 
								<small class="text-13 text-primary">
									@if ($gallery[0]->status == 0)
										<span class="badge bg-secondary">Archived</span> &nbsp; 
										<a class="text-dark" data-bs-target="#active-gallery-img" data-bs-toggle="modal" href="javascript:void(0)">
											<i class="fa fa-pencil"></i>
										</a>
									@elseif($gallery[0]->status == 1)
										<span class="badge bg-primary">Active</span> &nbsp; <a class="text-dark" data-bs-target="#archive-gallery-img" data-bs-toggle="modal" href="javascript:void(0)">
											<i class="fa fa-pencil"></i>
										</a>
									@endif
								</small>
							</h3>
							<p class="mb-1">
								<span class="text-dark text-15">{{ $gallery[0]->description }}</span>
							</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade"  id="archive-gallery-img">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h4 class="modal-title">Archive Investor</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to archive <b class="text-danger">{{ $gallery[0]->title }}</b> ?</p>
			</div>
			<div class="modal-footer">
				<form action="{{ route('archive.renovation_gallery') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $gallery[0]->id }}">
					<button class="btn btn-dark" type="submit">Yes Archive</button>
				</form>
				<button class="btn btn-light" data-bs-dismiss="modal" >Cancel</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade"  id="active-gallery-img">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h4 class="modal-title">Activate Investor</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to activate <b class="text-success">{{ $gallery[0]->title }}</b> ?</p>
			</div>
			<div class="modal-footer">
				<form action="{{ route('active.renovation_gallery') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $gallery[0]->id }}">
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