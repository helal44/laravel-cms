@extends('include.admin')

@section('content')
<div class="row">
   
    <div class="col-lg-2">
    <img src="/images/user_images/{{ $users->image}}" alt="image" height="200" width="150">
    </div>
    <div class="col-lg-10">
        <h1>/ Edit User </h1>
        <form action="{{route('save_edit',$users->id)}}" method="POST" enctype="multipart/form-data" >
        @csrf
            <div class="form-group">
                <label for="title">User Name</label>
                <input type="text" name="username" class="form-control" value="{{$users->name}}" >
            </div>
            <div class="form-group">
                <label for="title">User Email</label>
                <input type="text" name="useremail" class="form-control" value="{{$users->email}}" >
            </div>
            <div class="form-group">
                <label for="title">User Image</label>
                <input type="file" name="image" class="form-control" >
                
            </div>
            <div class="form-group">
                <label for="title">User Password</label>
                <input type="password" name="userpass" class="form-control" value="{{$users->password}}" >
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
                @if($users->is_active == 0){
                    <option value="{{$users->is_active}}">Not_Active</option>
                    <option value="1">Active</option>
                }
                @else{
                    <option value="{{$users->is_active}}">Active</option>
                    <option value="0">Not Active</option>
                }
                @endif
                </select>

            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Edit User" class="btn btn-primary">
            </div>
        </form>
        <div class="form-group">
                <a href="{{route('delete_user',$users->id)}}" class="btn btn-danger"> Delete_User</a>
            </div>
    </div>
</div>
@include('include.errors')
@stop

