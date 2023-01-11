@extends('include.blog_posts')

@section('post')

 <!-- Blog Post -->

         

    <h1>{{$post->user->name}}</h1>
    <h3>{{$post->cat->name ?? $post->category_id}}</h3>
    <h4>{{$post->title}}</h4>
    <img src="/images/post_images/{{ $post->image}}" alt="image" height="auto" width="auto">
    <p>{{$post->body}}</p>
    <p>{{$post->created_at->diffForHumans()}}</p>

          
                

@stop

<!--  category -->
@section('category')
 @foreach($cat as $cat)
 <li><a href="#">{{$cat->name}}</a>
 @endforeach
@stop

@section('comment')
@foreach($post->comment as $com)
<a class="pull-left" href="#">
    <img class="media-object"src="/images/user_images/{{Auth::user()->image}}" alt="img" width="50px" height="90px">
</a>
    <div class="media-body">
        <h4>{{$com->author}}</h1>
        <h4>{{$com->email}}</h2>
        <h5>{{$com->body}}</h5>
        <h6>{{$com->created_at->diffForHumans()}}</h6>
        <hr> <hr>
    </div>
@endforeach

@stop