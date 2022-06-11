@extends('admin.includes.layout')
@section('extra_css')
    
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Upload Images</label>
								<div>
									<input id="demo" type="file" name="files" accept=" image/jpeg, image/png, text/html" multiple />
									<input type="hidden" id="property_id" value="{{$property[0]->id}}">
								</div>
							</div>
						</div>
						
					</div>
					
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Files</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if($property[0]->pictures != null)
							@foreach($property[0]->pictures as $obj)
							<tr>
								<td>
									<img src="uploads/properties/{{$obj}}" width="100">
								</td>
								<td>
									<form action="{{route('property.deletePicture')}}" method="post">
										@csrf
										<input type="hidden" name="id" value="{{$property[0]->id}}" />
										<input type="hidden" name="file" value="{{$obj}}" />
										<button type="submit">
											<i class="fa fa-trash fa-lg"></i>
										</button>
									</form>
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>	
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
<script>
	(function($) {
		//fancyfileuplod
		var csrf_token = $('meta[name="csrf-token"]').attr('content');
		var id = $("input#property_id").val();
		$('#demo').FancyFileUpload({
			url: "{{route('property.updatePhotos')}}",
			params : {
				 _token: csrf_token,
				 id: id
			},
			maxfilesize : 1000000,
			edit: false
		});
	})(jQuery);
</script>
@endsection