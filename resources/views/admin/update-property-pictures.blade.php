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
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Error!</strong> Investor not Property. Please Check your internet connection and try again.
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
					<h4 class="card-title">{{ $property[0]->name }}</h4>
				</div>
				<div class="card-body">
					<form action="" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Upload Images</label>
									<div>
										<input id="demo" type="file" name="files" accept=" image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple />
									</div>
								</div>
							</div>
							
						</div>
						<button type="submit" class="btn btn-primary mt-3">Update Pictures</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('extra_js')
<script src="/admin/assets/plugins/select2/select2.full.min.js"></script>
<script src="/admin/assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="/admin/assets/plugins/fileuploads/js/file-upload.js"></script>
<script src="/admin/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="/admin/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="/admin/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="/admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="/admin/assets/plugins/fancyuploder/fancy-uploader.js"></script>
<script src="/admin/assets/js/formelementadvnced.js"></script>

@endsection