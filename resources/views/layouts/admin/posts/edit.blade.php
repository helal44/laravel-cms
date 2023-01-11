@extends('include.admin')

@section('content')

{{-- {!!Form::open(['method'=>'POST' ])!!}

{!! Form::label('title', 'title:') !!}

{!!Form::close()!!} --}}
<div class=" row">
    <div class=" col-lg-2">
    <img src="/images/post_images/{{ $post->image}}" alt="image" height="250px" width="200px">
    </div>
    <div class=" col-lg-10">
    <h1>/ Create Posts </h1>
            <form action="{{ route('save_post',$post->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
            <div class="form-group">
                <label for="title">Post_Author</label>
                <input type="text" name="author" class="form-control" value="{{$post->user->name}}">
            </div>
            <div class="form-group">
                <label for="title">Post_title</label>
                <input type="text" name="title" class="form-control" value="{{$post->title}}" >
            </div>
            <div class="form-group">
                <label for="title">Post_image</label>
                <input type="file" name="image" class="form-control" >
            </div>
            <div class="form-group">
                <label for="title">Post_body</label>
                <input type="text" name="body" class="form-control"  value="{{$post->body}}">
            </div>
            <div class="form-group">
                <label for="">Post_Category</label>
                <select name="category" class="form-control">
                    <option value="{{$post->category_id}}">{{$post->cat->name}}</option>
                @foreach($cat as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Create Post" class="btn btn-primary">
            </div>
            <div class="form-group">
               <a href="{{route('delete_post',$post->id)}}" class=" btn btn-danger"> Delete Post</a>
            </div>
        </form>
    </div>
</div>

@include('include.errors')
@stop

