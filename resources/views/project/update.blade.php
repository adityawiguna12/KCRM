@extends('layout.main')

@section('title', 'Create Project | KCRM')

@section('content')

<div class="xs">
	<h3>Update Project</h3>

	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">

	<form class="form-horizontal" method="post" action="{{ route('project.update', ['project' => $project->id]) }}">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Client</label>
		<div class="col-sm-8">
			<select class="form-control1" id="form-control1" name="client">
			@foreach($user as $users)
				<option value="{{ $users->id }}" @if($users->id == $project->user_id) selected @endif>{{$users->name}}</option>
			@endforeach
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Start</label>
		<div class="col-sm-8">
			<input type="date" class="form-control1" id="focusedinput" placeholder="Start" name="start" value="{{ $project->start }}">
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
			<input type="date" class="form-control1" id="focusedinput" placeholder="End" name="end" value="{{$project->end}}">
			@if($errors->has('end'))
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
				<input type="radio" name="status" value="0" @if($project->status == 0)  checked @endif> Negotiation
			</label>
			</div>
			<div class="radio-inline">
			<label>
				<input type="radio" name="status" value="1" @if($project->status == 1)  checked @endif> Developing
			</label>
			</div>
			<div class="radio-inline">
			<label>
				<input type="radio" name="status" value="2" @if($project->status == 2)  checked @endif> Finishing
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
			<input type="text" class="form-control1" id="focusedinput" placeholder="Name" name="name" value="{{ $project->name }}">
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
				{{$project->description}}
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
			<input type="text" class="form-control1" id="focusedinput" placeholder="Git" name="git" value="{{ $project->git }}">
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
				<option value="0" @if($project->payment->method == 0) selected @endif>50:50</option>
				<option value="1" @if($project->payment->method == 1) selected @endif>25:70</option>
				<option value="2" @if($project->payment->method == 2) selected @endif>Full End</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Transaction</label>
		<div class="col-sm-8">
			<input type="text" class="form-control1" id="focusedinput" placeholder="Transaction" name="transaksi" value="{{ $project->payment->transaksi }}">
		</div>
	</div>

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Lunas</label>
		<div class="col-sm-8">
			<div class="radio-inline">
			<label>
				<input type="radio" name="lunas" value="0" @if($project->payment->lunas == 0) checked @endif> No
			</label>
			</div>
			<div class="radio-inline">
			<label>
				<input type="radio" name="lunas" value="1" @if($project->payment->lunas == 1) checked @endif> Yes
			</label>
			</div>
		</div>
	</div>

	<input type="hidden" name="_method" value="PUT">
								
    <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="" value="Submit" class="btn btn-success">
				<a href="{{ route('project.index') }}" class="btn btn-default">Cancel</a>
			</div>
		</div>
	</div>
    </form>

  </div>
  </div>

</div>

@endsection