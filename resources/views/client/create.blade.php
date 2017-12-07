@extends('layout.main')

@section('title', 'Create User or Client | KCRM')

@section('content')
<div class="xs">
	<h3>Create User</h3>
  	    <div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">

				<form class="form-horizontal" method="post" action="{{ route('client.store') }}">
				{{ csrf_field() }}
				<input type="hidden" name="__method" value="POST">

					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" placeholder="Name" name="name" value="{{ old('name') }}">
							@if($errors->has('name'))
								<div class="alert alert-danger">
									<h5>{{ $errors->first('name') }}</h5>
								</div>
							@endif
						</div>
					</div>


					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" placeholder="Email" name="email" value="{{old('email')}}">
							@if($errors->has('email'))
								<div class="alert alert-danger">
									<h5>{{ $errors->first('email') }}</h5>
								</div>
							@endif
						</div>
					</div>

					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control1" id="focusedinput" placeholder="Password" name="password" value="{{ old('password') }}">
							@if($errors->has('password'))
								<div class="alert alert-danger">
									<h5>{{ $errors->first('password') }}</h5>
								</div>
							@endif
						</div>
					</div>

					

					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-8">
							<div class="radio-inline">
							<label>
								<input type="radio" name="status" value="0"> Client
							</label>
							</div>
							<div class="radio-inline">
							<label>
								<input type="radio" name="status" value="1"> Admin or Employee
							</label>
							</div>
							@if($errors->has('status'))
								<div class="alert alert-danger">
									<h5>{{ $errors->first('status') }}</h5>
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