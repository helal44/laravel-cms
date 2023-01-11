@extends('include.admin')

@section('content')

<h1 class="justify-center">/Comments Table</h1>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Status</th>
        <th scope="col">Author</th>
        <th scope="col">Email</th>
        <th scope="col">Post_name</th>
        <th scope="col">Body</th>
        <th scope="col">Created_at</th>
        <th scope="col">Updated_at</th>
        <th scope="col">Status</th>
        <th scope="col">Delete Comment</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comment as $com )
      <tr>
        <td>{{ $com->id }}</td>
        @if ($com->is_active==1)
        <td>Approved</td>
        @else
        <td>Dis_Approved</td>
        @endif
        <td>{{$com->author}}</td>
        <td>{{$com->email}}</td>
        <td><a href="{{route('signal_post',$com->post->id)}}">{{$com->post->title}}</a></td>
        <td>{{Str::limit($com->body,10)}}</td>
        <td>{{ $com->created_at->diffForHumans() }}</td>
        <td>{{ $com->updated_at->diffForHumans() }}</td>
        @if ($com->is_active==1)
        <td><a href="{{route('comment_status',$com->id)}}" class=" btn btn-defult">Dis Approved</a></td>
        @elseif($com->is_active==0)
        <td><a href="{{route('comment_status',$com->id)}}" class=" btn btn-primary">Approved</a></td>
        @endif

        <td><a href="{{route('delete_comment',$com->id)}}" class=" btn btn-danger">Delete</a></td>

      </tr>
      @endforeach

    </tbody>
  </table>
@stop




