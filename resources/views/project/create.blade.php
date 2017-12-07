@extends('layout.main')

@section('title', 'Create Project | KCRM')

@section('content')

<div class="xs">
	<h3>Create Project</h3>

	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">

	<form class="form-horizontal" method="post" action="{{ route('project.store') }}">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Client</label>
		<div class="col-sm-8">
			<select class="form-control1" id="form-control1" name="client">
			@foreach($user as $users)
				<option value="{{ $users->id }}">{{$users->name}}</option>
			@endforeach
			</select>
			@if($errors->has('client'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('client') }}</h5>
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
		<label for="focusedinput" class="col-sm-2 control-label">End</label>
		<div class="col-sm-8">
			<input type="date" class="form-control1" id="focusedinput" placeholder="End" name="end" {{old('end')}}>
			@if($errors->has('start'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('end') }}</h5>
				</div>
			@endif
		</div>
	</div>

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Status</label>
		<div class="col-sm-8">
			<div class="radio-inline">
			<label>
				<input type="radio" name="status" value="0"> Negotiation
			</label>
			</div>
			<div class="radio-inline">
			<label>
				<input type="radio" name="status" value="1"> Developing
			</label>
			</div>
			<div class="radio-inline">
			<label>
				<input type="radio" name="status" value="2"> Finishing
			</label>
			</div>
			
			@if($errors->has('status'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('status') }}</h5>
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
		<label for="focusedinput" class="col-sm-2 control-label">Description</label>
		<div class="col-sm-8">
			<textarea rows="10" cols="50" name="description" placeholder="Description">
				{{old('description')}}
			</textarea>
			@if($errors->has('description'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('description') }}</h5>
				</div>
			@endif
		</div>
	</div>

    <div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Git</label>
		<div class="col-sm-8">
			<input type="text" class="form-control1" id="focusedinput" placeholder="Git" name="git" value="{{old('git')}}">
		</div>
	</div>

    {{-- <div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Payment</label>
		<div class="col-sm-8">
			<input type="text" class="form-control1" id="focusedinput" placeholder="Payment" name="payment">
		</div>
	</div> --}}

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Method</label>
		<div class="col-sm-8">
			<select class="form-control1" id="form-control1" name="method">
				<option value="0">50:50</option>
				<option value="1">25:70</option>
				<option value="2">Full End</option>
			</select>
			@if($errors->has('method'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('method') }}</h5>
				</div>
			@endif
		</div>
	</div>

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Transaction</label>
		<div class="col-sm-8">
			<input type="text" class="form-control1" id="focusedinput" placeholder="Transaction" name="transaksi" value="{{old('transaksi')}}">
		</div>
		@if($errors->has('transaksi'))
			<div class="alert alert-danger">
				<h5>{{ $errors->first('transaksi') }}</h5>
			</div>
		@endif
	</div>

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Lunas</label>
		<div class="col-sm-8">
			<div class="radio-inline">
			<label>
				<input type="radio" name="lunas" value="0"> No
			</label>
			</div>
			<div class="radio-inline">
			<label>
				<input type="radio" name="lunas" value="1"> Yes
			</label>
			</div>
			@if($errors->has('lunas'))
				<div class="alert alert-danger">
					<h5>{{ $errors->first('lunas') }}</h5>
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