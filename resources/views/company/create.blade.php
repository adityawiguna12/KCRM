@extends('layout.main')

@section('title', 'Create Company | KCRM')

@section('content')

<div class="xs">
	<h3>Create Company</h3>
<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">

	<form class="form-horizontal" method="post" action="{{ route('company.store') }}">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Owner</label>
		<div class="col-sm-8">
			<select class="form-control1" id="form-control1" name="owner">
			@foreach($user as $users)
				<option value="{{ $users->id }}">{{$users->name}}</option>
			@endforeach
			</select>
			@if($errors->has('owner'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('owner') }}</h5>
				</div>
			@endif
		</div>
	</div>

    <div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-8">
			<input type="text" class="form-control1" id="focusedinput" placeholder="Name" name="name" value="{{old('name')}}">
			@if($errors->has('name'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('name') }}</h5>
				</div>
			@endif
		</div>
	</div>

    <div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Address</label>
		<div class="col-sm-8">
			<input type="text" class="form-control1" id="focusedinput" placeholder="Address" name="address" value="{{old('address')}}">
			@if($errors->has('address'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('address') }}</h5>
				</div>
			@endif
		</div>
	</div>

    <div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Website</label>
		<div class="col-sm-8">
			<input type="text" class="form-control1" id="focusedinput" placeholder="Website" name="website" value="{{old('website')}}">
		</div>
	</div>

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Phone</label>
		<div class="col-sm-8">
			<input type="text" class="form-control1" id="focusedinput" placeholder="Phone" name="phone" value="{{old('phone')}}">
			@if($errors->has('phone'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('phone') }}</h5>
				</div>
			@endif
		</div>
	</div>


	<input type="hidden" name="_method" value="POST">
								
    <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="" value="Submit" class="btn btn-success">
				<a href="{{ route('company.index') }}" class="btn btn-default">Cancel</a>
			</div>
		</div>
	</div>
    </form>

  </div>
  </div>

</div>
@endsection