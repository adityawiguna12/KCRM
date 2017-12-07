@extends('layout.main')

@section('title', 'Create Project | KCRM')

@section('content')

<div class="xs">
	<h3>Create Ticket</h3>

	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">

	<form class="form-horizontal" method="post" action="{{ route('ticketing.store') }}">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Project</label>
		<div class="col-sm-8">
			<select class="form-control1" id="form-control1" name="project">
			@foreach($project as $projects)
				<option value="{{ $projects->id }}">{{$projects->name}}</option>
			@endforeach
			</select>
		</div>
		@if($errors->has('project'))
			<div class="alert alert-danger">
				<h5>{{ $errors->first('project') }}</h5>
			</div>
		@endif
	</div>

    <div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Problem</label>
		<div class="col-sm-8">
			<textarea rows="10" cols="50" name="problem" placeholder="Problem">
				
			</textarea>
			@if($errors->has('problem'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('problem') }}</h5>
				</div>
			@endif
		</div>
	</div>

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Level</label>
		<div class="col-sm-8">
			<select class="form-control1" id="form-control1" name="level">
				<option value="0">Easily</option>
				<option value="1">Intermediet</option>
				<option value="2">Extreamly</option>
			</select>
			@if($errors->has('level'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('level') }}</h5>
				</div>
			@endif
		</div>
	</div>

	<input type="hidden" name="_method" value="POST">
								
    <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="" value="Submit" class="btn btn-success">
				<button class="btn-default btn">Cancel</button>
			</div>
		</div>
	</div>
    </form>

  </div>
  </div>

</div>

@endsection