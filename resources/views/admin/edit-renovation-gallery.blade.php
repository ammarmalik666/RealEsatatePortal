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
						<form action="{{ route('update.renovation_gallery') }}" method="POST">
						@csrf
						<input type="hidden" name="id" value="{{ $gallery[0]->id }}">
						<input type="hidden" name="slug" value="{{ $gallery[0]->slug }}">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="">Title</label>
									<input type="text" class="form-control" placeholder="Enter title here" name="title" value="{{ $gallery[0]->title }}">
									@error('title')
			                            <small class="form-error">{{ $message }}</small>
			                        @enderror
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label for="">Upload Image</label>
									<input type="file" class="form-control" name="image">
									@error('image')
			                            <small class="form-error">{{ $message }}</small>
			                        @enderror
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label for="">Description</label>
									<textarea name="description" class="form-control" placeholder="Enter description here" cols="30" rows="10">{{ $gallery[0]->description }}</textarea>
									@error('description')
			                            <small class="form-error">{{ $message }}</small>
			                        @enderror
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary mt-3">Update Details</button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('extra_js')

@endsection