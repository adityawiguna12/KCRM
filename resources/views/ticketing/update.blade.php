@extends('layout.main')

@section('title', 'Update Ticket | KCRM')

@section('content')

@if(Auth::user()->status == 1)

<div class="xs">
	<h3>Update Ticket</h3>

	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">

	<form class="form-horizontal" method="post" action="{{ route('ticketing.update', ['ticket' => $ticket->id]) }}">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Level</label>
		<div class="col-sm-8">
			<select class="form-control1" id="form-control1" name="level">
				<option value="0" @if($ticket->tingkat == 0) selected @endif >Easily</option>
				<option value="1" @if($ticket->tingkat == 1) selected @endif >Intermediet</option>
				<option value="2" @if($ticket->tingkat == 2) selected @endif >Extreamly</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Level</label>
		<div class="col-sm-8">
			<select class="form-control1" id="form-control1" name="status">
				<option value="0" @if($ticket->status == 0) selected @endif >Unslove</option>
				<option value="1" @if($ticket->status == 1) selected @endif >Sloved</option>
			</select>
		</div>
	</div>

	<input type="hidden" name="_method" value="PUT">
								
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

@else

<div class="xs">
	<h3>Update Ticket</h3>

	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">

	<form class="form-horizontal" method="post" action="{{ route('ticketing.update', ['ticket' => $ticket->id]) }}">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Project</label>
		<div class="col-sm-8">
			<select class="form-control1" id="form-control1" name="project">
			@foreach($project as $projects)
				<option value="{{ $projects->id }}" @if($ticket->project_id == $projects->id) selected @endif>{{$projects->name}}</option>
			@endforeach
			</select>
		</div>
	</div>

    <div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Problem</label>
		<div class="col-sm-8">
			<textarea rows="10" cols="50" name="problem" placeholder="Problem">
				{{ $ticket->keluhan }}
			</textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="focusedinput" class="col-sm-2 control-label">Level</label>
		<div class="col-sm-8">
			<select class="form-control1" id="form-control1" name="level">
				<option value="0" @if($ticket->tingkat == 0) selected @endif >Easily</option>
				<option value="1" @if($ticket->tingkat == 1) selected @endif >Intermediet</option>
				<option value="2" @if($ticket->tingkat == 2) selected @endif >Extreamly</option>
			</select>
		</div>
	</div>

	<input type="hidden" name="_method" value="PUT">
								
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

@endif

@endsection