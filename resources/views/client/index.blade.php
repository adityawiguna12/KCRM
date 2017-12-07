@extends('layout.main')

@section('title', 'User or Client | KCRM')

@section('content')

<div class="xs">
<h3>Client or User</h3>
<a href="{{ route('client.create') }}" class="btn btn-primary">Create User</a>
<div class="panel-body1">
   <table class="table">
     <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $i = 1;
        $status = array('Client', 'Admin / Employee');
      ?>
      @forelse($user as $users)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $users->name }}</td>
          <td>{{ $users->email }}</td>
          <td>{{ $status[$users->status] }}</td>
          <td>
            <form action=" {{route('client.destroy', ['user' => $users->id])}}" method="post" class="col-sm-6">
              <button type="submit" class="btn btn-danger">Delete</button>
              <input type="hidden" name="_method" value="DELETE">
              {{csrf_field()}}
            </form>
          </td>
        </tr>
        @empty
        <h3>Client or User is empty</h3>
      @endforelse
        
      </tbody>
    </table>
</div>

</div>

@endsection