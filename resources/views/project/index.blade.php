@extends('layout.main')

@section('title', 'Project | KCRM')

@section('content')

@if(Auth::user()->status == 1)

<div class="xs">
<h3>Projects</h3>
<a href="{{ route('project.create') }}" class="btn btn-primary">Create Project</a>
<div class="panel-body1">
   <table class="table">
     <thead>
        <tr>
          <th>#</th>
          <th>Start</th>
          <th>End</th>
          <th>Status</th>
          <th>Name</th>
          <th>Payment</th>
          <th>Lunas</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $i = 1;
          $status = array('On Negotiation', 'On Developing', 'On Finishing');
          $method = array('50:50', '25:75', 'Full End');
          $lunas = array('No', 'Yes');
        ?>
      @forelse($project as $projects)
        <tr>
        
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $projects->start }}</td>
          <td>{{ $projects->end }}</td>
          <td>{{ $status[$projects->status] }}</td>
          <td>{{ $projects->name }}</td>
          <td>{{ $method[$projects->payment->method] }}</td>
          <td>{{ $lunas[$projects->payment->lunas] }}</td>
          <td>
          <form action="{{route('project.edit', ['project' => $projects->id])}}" method="post" class="col-sm-6">
            <button type="submit" class="btn btn-primary">Update</button>
            <input type="hidden" name="_method" value="GET">
            {{csrf_field()}}
          </form>
          <form action=" {{route('project.destroy', ['project' => $projects->id])}}" method="post" class="col-sm-6">
            <button type="submit" class="btn btn-danger">Delete</button>
            <input type="hidden" name="_method" value="DELETE">
            {{csrf_field()}}
          </form>
          </td>
        </tr>
        @empty
        <center>Projects is empty</center>
      @endforelse
      </tbody>
    </table>
</div>

</div>

@else

<div class="xs">
<h3>Your Projects</h3>
<div class="panel-body1">
   <table class="table">
     <thead>
        <tr>
          <th>#</th>
          <th>Start</th>
          <th>End</th>
          <th>Status</th>
          <th>Name</th>
          <th>Payment</th>
          <th>Lunas</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $i = 1;
          $status = array('On Negotiation', 'On Developing', 'On Finishing');
          $method = array('50:50', '25:75', 'Full End');
          $lunas = array('No', 'Yes');
        ?>
      @forelse($project as $projects)
        <tr>
        
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $projects->start }}</td>
          <td>{{ $projects->end }}</td>
          <td>{{ $status[$projects->status] }}</td>
          <td>{{ $projects->name }}</td>
          <td>{{ $method[$projects->payment->method] }}</td>
          <td>{{ $lunas[$projects->payment->lunas] }}</td>
        </tr>
        @empty
        <center>Projects is empty</center>
      @endforelse
      </tbody>
    </table>
</div>

</div>

@endif

@endsection