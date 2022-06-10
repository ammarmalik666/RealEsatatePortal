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
				<li class="breadcrumb-item"><a href="javascript:void(0);">Projects</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Project</li>
			</ol>
		</div>
	</div>
	<div class="row row-sm">
		<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
			@if($errors->any())
                @if($errors->first() == 'property_created')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> <strong>Success!</strong> Project added successfully.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @elseif($errors->first() == 'property_not_created')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Error!</strong> Project not Added. Please Check your internet connection and try again.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @elseif($errors->first() == 'unknownError')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
						<i class="fa fa-exclamation me-2" aria-hidden="true"></i> <strong>Error!</strong> Please Check your internet connection and try again.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
                @endif
            @endif
			<div class="card box-shadow-0">
				<div class="card-header border-bottom">
					<h4 class="card-title">Edit Project Details</h4>
				</div>
				<div class="card-body">
					<form action="{{ route('update.project') }}" method="POST">
						@csrf
						<input type="hidden" value="{{ $project[0]->id }}" name="id">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Name of the Project</label>
									<input type="text" class="form-control" placeholder="Enter property name here" required name="name" value="{{ $project[0]->name }}">
									@error('name')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Select Property</label>
									<select class="form-control form-select" name="property">
										<option selected disabled>Select Property</option>
										@if ($properties_count == 0)
											<option>No roperties added yet.</option>
										@else
										<option selected value="{{ $project[0]['property'][0]->id }}">{{ $project[0]['property'][0]->name }}</option>
											@foreach ($project[0]->property_other as $property)
												<option value="{{ $property->id }}">{{ $property->name }}</option>
											@endforeach
										@endif
									</select>
									@error('property')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control form-select" name="project_status">
										@if ($project[0]->project_status == "planning")
											<option selected value="{{ $project[0]->project_status }}">Planning</option>
										@elseif ($project[0]->project_status == "in_process")
											<option selected value="{{ $project[0]->project_status }}">In Process</option>
										@elseif ($project[0]->project_status == "completed")
											<option selected value="{{ $project[0]->project_status }}">Completed</option>
										@endif
										<option disabled>Select Status</option>
										<option value="planning">Planning</option>
										<option value="in_process">In Process</option>
										<option value="completed">Completed</option>
									</select>
									@error('project_status')
	                                    <small class="form-error">{{ $message }}</small>
	                                @enderror
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary mt-3">Update Project</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('extra_js')
<script>
	$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><div class="row"><div class="col-md-6"><label for="">Name</label><input type="text" class="form-control" name="image_title[]" value=""/></div><div class="col-md-5"><label for="">Image</label><input type="file" class="form-control" name="image[]" value=""/></div><div class="col-md-1"><a href="javascript:void(0);" class="remove_button"><i class="fa fa-check"></i></a></div></div></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection