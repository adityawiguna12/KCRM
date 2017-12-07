@extends('layout.main')

@section('title', 'Craete Contract | KCRM')

@section('content')

<div class="xs">
	<h3>Create Contract</h3>
  	    <div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">

				<form class="form-horizontal" method="post" action="{{ route('contract.store') }}">
				{{ csrf_field() }}
				<input type="hidden" name="__method" value="POST">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Project or Website</label>
						<div class="col-sm-8">
							<select class="form-control1" name="project" id="form-control1">
							@foreach($project as $projects)
								<option value="{{ $projects->id }}">{{$projects->name}}</option>
							@endforeach
							</select>
							@if($errors->has('project'))
								<div class="alert alert-danger">
									<h5>{{ $errors->first('project') }}</h5>
								</div>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Client</label>
						<div class="col-sm-8">
							<select class="form-control1" name="user" id="form-control1">
							@foreach($user as $users)
								<option value="{{ $users->id }}">{{$users->name}}</option>
							@endforeach
							</select>
							@if($errors->has('user'))
								<div class="alert alert-danger">
									<h5>{{ $errors->first('user') }}</h5>
								</div>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Method</label>
						<div class="col-sm-8">
							<div class="radio-inline">
							<label>
								<input type="radio" name="method" value="0"> Monthly
							</label>
							</div>
							<div class="radio-inline">
							<label>
								<input type="radio" name="method" value="1"> 6 Monthly
							</label>
							</div>
							<div class="radio-inline">
							<label>
								<input type="radio" name="method" value="2"> Yearly
							</label>
							</div>
							@if($errors->has('method'))
								<div class="alert alert-danger">
									<h5>{{ $errors->first('method') }}</h5>
								</div>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Start</label>
						<div class="col-sm-8">
							<input type="date" class="form-control1" id="focusedinput" placeholder="Start" name="start" value="{{old('start')}}">
							@if($errors->has('start'))
								<div class="alert alert-danger">
									<h5>{{ $errors->first('start') }}</h5>
								</div>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Expired</label>
						<div class="col-sm-8">
							<input type="date" class="form-control1" id="focusedinput" placeholder="Expired" name="expired" value="{{ old('expired') }}">
							@if($errors->has('expired'))
								<div class="alert alert-danger">
									<h5>{{ $errors->first('expired') }}</h5>
								</div>
							@endif
						</div>
					</div>
								
      <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button class="btn-success btn">Submit</button>
				<button class="btn-default btn">Cancel</button>
			</div>
		</div>
	 </div>
    </form>
    
  </div>
  </div>
</div>

@endsection