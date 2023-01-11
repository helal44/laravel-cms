@extends('include.admin')

@section('content')

<h1 class="justify-center">/Posts Table</h1>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Post_Author</th>
        <th scope="col">Category</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Created_at</th>
        <th scope="col">Updated_at</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $posts )
            @if ($posts)


      <tr>
        <td>{{ $posts->id }}</td>
        <td><img src="/images/post_images/{{ $posts->image}}" alt="image" height="70px" width="60px"></td>
        <td>{{ $posts->user->name }}</td>
        <td>{{$posts->cat->name ?? $posts->category_id}}</td>
        <td><a href="{{route('edit_post',$posts->id)}}">{{ $posts->title }}</a></td>
        <td>{{Str::limit( $posts->body,8) }}</td>
        <td>{{ $posts->created_at->diffForHumans() }}</td>
        <td>{{ $posts->updated_at->diffForHumans() }}</td>

      </tr>
      @endif
      @endforeach

    </tbody>
  </table>
@stop




