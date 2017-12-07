@extends('layout.main')

@section('title', 'Contract | KCRM')

@section('content')

@if(Auth::user()->status == 1)

<div class="xs">
<h3>Contract</h3>
<a href="{{ route('contract.create') }}" class="btn btn-primary">Create Kontrak</a>
<div class="panel-body1">
   <table class="table">
     <thead>
        <tr>
          <th>#</th>
          <th>Client</th>
          <th>Project</th>
          <th>Method</th>
          <th>Start</th>
          <th>Expired</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $i = 1;
        $method = array('Monthly', '6 Monthly', 'Yearly');
      ?>
      @foreach($contract as $contracts)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $contracts->user->name }}</td>
          <td>{{ $contracts->project->name }}</td>
          <td>{{ $method[$contracts->method] }}</td>
          <td>{{ $contracts->start }}</td>
          <td>{{ $contracts->expired }}</td>
          <td>
            <form action="{{route('contract.edit', ['contract' => $contracts->id])}}" method="post" class="col-sm-6">
              <button type="submit" class="btn btn-primary">Update</button>
              <input type="hidden" name="_method" value="GET">
              {{csrf_field()}}
            </form>
            <form action=" {{route('contract.destroy', ['contract' => $contracts->id])}}" method="post" class="col-sm-6">
              <button type="submit" class="btn btn-danger">Delete</button>
              <input type="hidden" name="_method" value="DELETE">
              {{csrf_field()}}
            </form>
          </td>
        </tr>
      @endforeach
        
      </tbody>
    </table>
</div>

</div>

@else

<div class="xs">
<h3>Your Contract</h3>
<div class="panel-body1">
   <table class="table">
     <thead>
        <tr>
          <th>#</th>
          <th>Client</th>
          <th>Project</th>
          <th>Method</th>
          <th>Start</th>
          <th>Expired</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $i = 1;
        $method = array('Monthly', '6 Monthly', 'Yearly');
      ?>
      @foreach($contract as $contracts)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $contracts->user->name }}</td>
          <td>{{ $contracts->project->name }}</td>
          <td>{{ $method[$contracts->method] }}</td>
          <td>{{ $contracts->start }}</td>
          <td>{{ $contracts->expired }}</td>
         
        </tr>
      @endforeach
        
      </tbody>
    </table>
</div>

</div>

@endif

@endsection