@extends('layouts.admin')

@section('content')

<h1 class="justify-center">/Users Table</h1>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th>
        <th scope="col">Created_at</th>
        <th scope="col">Updated_at</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user )
            @if ($user)


      <tr>
        <td>{{ $user->id }}</td>
        <td><img src="/images/user_images/{{ $user->image}}" alt="image" height="50%" width="50%"></td>
        <td><a href="{{route('edit_user',$user->id)}}">{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role->name }}</td>
        <td>{{ $user->is_active == 1 ? 'Active' :'Not Active' }}</td>
        <td>{{ $user->created_at->diffForHumans() }}</td>
        <td>{{ $user->updated_at->diffForHumans() }}</td>

      </tr>
      @endif
      @endforeach

    </tbody>
  </table>
@stop




