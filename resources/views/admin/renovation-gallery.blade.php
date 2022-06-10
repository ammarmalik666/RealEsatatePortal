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
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Home</li>
				<li class="breadcrumb-item"><a href="javascript:void(0);">Renovation Gallery</a></li>
			</ol>
		</div>
	</div>
	<div class="row clients-contacts-main">
		<div class="col-md-12 col-xl-12">
			@if($errors->any())
                @if($errors->first() == 'gallery_image_created')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> <strong>Success!</strong> Image added to renovation gallery succesfully.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @elseif($errors->first() == 'gallery_image_not_created')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Error!</strong> Error. Please Check your internet connection and try again.
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
								<input type="text" class="form-control" placeholder="Search images.....">
								<button class="btn ripple btn-primary text-white input-group-text border-0" type="button">Search</button>
							</div>
						</div>
						<div class="col-xl offset-lg-6 col-lg-2 col-md-12 me-auto">
							<div class="btn-list">
								<a data-bs-target="#add-gallery-image" data-bs-toggle="modal" href="javascript:void(0)" class="btn btn-primary">
									<svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
									Add Image
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row row-cards">
		<div class="col-xl-12 col-lg-12">
			<div class="row products-main">
				@foreach ($gallery as $gallery)
					<div class="col-12 col-md-4 col-sm-12 col-lg-4 col-xl-4">
						<div class="card item-card">
							<div class="product-grid6 card-body">
								<div class="product-image6">
									<a href="/admin/renovation-gallery/{{ $gallery->slug }}/details" class="">
										<img class="img-fluid" src="/uploads/renovation-gallery/{{ $gallery->image }}" alt="img">
									</a>
								</div>
								<div class="product-content w-100 p-3">
									<div class="mb-2">
										<h4 class="mb-1 text-normal"><a href="/admin/renovation-gallery/{{ $gallery->slug }}/details">{{ $gallery->title }}</a> </h4>
										<p class="mb-0 text-muted text-start">
											{{substr($gallery->description, 0, 55); }}
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<div class="modal fade"  id="add-gallery-image">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h4 class="modal-title">Add Image in Gallery</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add.renovation_gallery') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Title</label>
						<input type="text" class="form-control" placeholder="Enter title here" name="title">
						@error('title')
                            <small class="form-error">{{ $message }}</small>
                        @enderror
					</div>
					<div class="form-group">
						<label for="">Upload Image</label>
						<input type="file" class="form-control" name="image" required>
						@error('image')
                            <small class="form-error">{{ $message }}</small>
                        @enderror
					</div>
					<div class="form-group">
						<label for="">Description</label>
						<textarea name="description" class="form-control" placeholder="Enter description here" cols="30" rows="10"></textarea>
						@error('description')
                            <small class="form-error">{{ $message }}</small>
                        @enderror
					</div>
			</div>
			<div class="modal-footer">
					<button class="btn btn-success" type="submit">Add</button>
				</form>
				<button class="btn btn-light" data-bs-dismiss="modal" >Cancel</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('extra_js')

@endsection