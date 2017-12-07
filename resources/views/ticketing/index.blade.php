@extends('layout.main')

@section('title', 'Ticket | KCRM')

@section('content')

@if(Auth::user()->status == 1)

<div class="xs">
<h3>Tickets from Client</h3>
{{-- <a href="{{ route('project.create') }}" class="btn btn-primary">Create Project</a> --}}
<div class="panel-body1">
   <table class="table">
     <thead>
        <tr>
          <th>#</th>
          <th>Clint</th>
          <th>Program or Website</th>
          <th>Problem</th>
          <th>Level</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $i = 1;
        $level = array('Easily', 'Intermediet', 'Extreamly');
        $status = array('Unslove', 'Sloved');
      ?>
      @forelse($ticket as $tickets)
        <tr>
        
          <th scope="row">{{$i++}}</th>
          <td>{{ $tickets->user->name }}</td>
          <td>{{ $tickets->project->name }}</td>
          <td>{{ $tickets->keluhan }}</td>
          <td>{{ $level[$tickets->tingkat] }}</td>
          <td>{{ $status[$tickets->status] }}</td>
          <td>
          <form action="{{route('ticketing.edit', ['ticket' => $tickets->id])}}" method="post" class="col-sm-6">
            <button type="submit" class="btn btn-primary">Update</button>
            <input type="hidden" name="_method" value="GET">
            {{csrf_field()}}
          </form>
          </td>
        </tr>
        @empty
        <center>Ticket is empty</center>
      @endforelse
      </tbody>
    </table>
</div>

</div>

@else

<div class="xs">
<h3>Your Tickets</h3>
<a href="{{ route('ticketing.create') }}" class="btn btn-primary">Create Ticket</a>
<div class="panel-body1">
   <table class="table">
     <thead>
        <tr>
          <th>#</th>
          <th>Client</th>
          <th>Program or Website</th>
          <th>Problem</th>
          <th>Level</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $i = 1;
        $level = array('Easily', 'Intermediet', 'Extreamly');
        $status = array('Unslove', 'Sloved');
      ?>
      @forelse($ticket as $tickets)
        <tr>
        
          <th scope="row">{{$i++}}</th>
          <td>{{ $tickets->user->name }}</td>
          <td>{{ $tickets->project->name }}</td>
          <td>{{ $tickets->keluhan }}</td>
          <td>{{ $level[$tickets->tingkat] }}</td>
          <td>{{ $status[$tickets->status] }}</td>
          <td>
          <form action="{{route('ticketing.edit', ['ticket' => $tickets->id])}}" method="post" class="col-sm-6">
            <button type="submit" class="btn btn-primary">Update</button>
            <input type="hidden" name="_method" value="GET">
            {{csrf_field()}}
          </form>
          <form action=" {{route('ticketing.destroy', ['ticket' => $tickets->id])}}" method="post" class="col-sm-6">
            <button type="submit" class="btn btn-danger">Delete</button>
            <input type="hidden" name="_method" value="DELETE">
            {{csrf_field()}}
          </form>
          </td>
        </tr>
        @empty
        <center>Your Ticket is empty</center>
      @endforelse
      </tbody>
    </table>
</div>

</div>

@endif

@endsection