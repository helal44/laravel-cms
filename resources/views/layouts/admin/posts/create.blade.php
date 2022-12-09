@extends('layouts.admin')

@section('content')
<h1>/ Create Posts </h1>
{{-- {!!Form::open(['method'=>'POST' ])!!}

{!! Form::label('title', 'title:') !!}

{!!Form::close()!!} --}}

<form action="{{ route('store_post') }}" method="POST" enctype="multipart/form-data" >
   @csrf
    <div class="form-group">
        <label for="title">Post_Author</label>
        <input type="text" name="author" class="form-control" >
    </div>
    <div class="form-group">
        <label for="title">Post_title</label>
        <input type="text" name="title" class="form-control" >
    </div>
    <div class="form-group">
        <label for="title">Post_image</label>
        <input type="file" name="image" class="form-control" >
    </div>
    <div class="form-group">
        <label for="title">Post_body</label>
        <input type="text" name="body" class="form-control" >
    </div>
    <div class="form-group">
        <label for="">Post_Category</label>
        <select name="category" class="form-control">
           @foreach($cat as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
           @endforeach
        </select>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Create User" class="btn btn-primary">
    </div>
</form>
@include('include.errors')
@stop

