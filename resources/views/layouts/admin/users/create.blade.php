@extends('layouts.admin')

@section('content')
<h1>/ Create User </h1>
{{-- {!!Form::open(['method'=>'POST' ])!!}

{!! Form::label('title', 'title:') !!}

{!!Form::close()!!} --}}

<form action="{{ route('store_user') }}" method="POST" enctype="multipart/form-data" >
   @csrf
    <div class="form-group">
        <label for="title">User Name</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="title">User Email</label>
        <input type="text" name="useremail" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="title">User Image</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="title">User Password</label>
        <input type="password" name="userpass" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">User Role</label>
        <select name="userrole" class="form-control">
            @foreach ($role as $r )
            <option value="{{ $r->id }}">Role::{{ $r->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for=""> User Status</label>
        <select name="userstatus" class="form-control" >
            <option value="0">Not Active</option>
            <option value="1"  >Active</option>
        </select>

    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Create User" class="btn btn-primary">
    </div>
</form>
@stop

