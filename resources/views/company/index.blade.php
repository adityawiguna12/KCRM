@extends('layout.main')

@section('title', 'Company | KCRM')

@section('content')

@if(Auth::user()->status == 1)

<div class="xs">
<h3>Company</h3>
<a href="{{ route('company.create') }}" class="btn btn-primary">Create Company</a>
<div class="panel-body1">
   <table class="table">
     <thead>
        <tr>
          <th>#</th>
          <th>Owner</th>
          <th>Name</th>
          <th>Address</th>
          <th>Website</th>
          <th>Phone</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $i = 1;
      ?>
      @forelse($company as $companies)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $companies->user->name }}</td>
          <td>{{ $companies->name }}</td>
          <td>{{ $companies->address }}</td>
          <td>
            @if($companies->website == "")
              Empty
            @else
              {{ $companies->website }}
            @endif
          </td>
          <td>{{ $companies->phone }}</td>
          <td>
            <form action="{{route('company.edit', ['company' => $companies->id])}}" method="post" class="col-sm-6">
              <button type="submit" class="btn btn-primary">Update</button>
              <input type="hidden" name="_method" value="GET">
              {{csrf_field()}}
            </form>
            <form action=" {{route('company.destroy', ['company' => $companies->id])}}" method="post" class="col-sm-6">
              <button type="submit" class="btn btn-danger">Delete</button>
              <input type="hidden" name="_method" value="DELETE">
              {{csrf_field()}}
            </form>
          </td>
        </tr>
        @empty
        <h3>Company is empty</h3>
      @endforelse
        
      </tbody>
    </table>
</div>

</div>

@else

<div class="xs">
<h3>Company</h3>
<div class="panel-body1">
   <table class="table">
     <thead>
        <tr>
          <th>#</th>
          <th>Owner</th>
          <th>Name</th>
          <th>Address</th>
          <th>Website</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $i = 1;
      ?>
      @forelse($company as $companies)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $companies->user->name }}</td>
          <td>{{ $companies->name }}</td>
          <td>{{ $companies->address }}</td>
          <td>{{ $companies->website }}</td>
          <td>{{ $companies->phone }}</td>
        </tr>
        @empty
        <h3>Company is empty</h3>
      @endforelse
        
      </tbody>
    </table>
</div>

</div>

@endif

@endsection