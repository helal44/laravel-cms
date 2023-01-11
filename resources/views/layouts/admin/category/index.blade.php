@extends('include.admin')

@section('content')
<div class=" row">
    <div class=" col-lg-4">
     <h1>/ Create Category </h1>
            <form action="{{ route('save_category') }}" method="POST" enctype="multipart/form-data" >
        @csrf
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="name" class="form-control" >
            </div>
            
            <div class="form-group">
                <input type="submit" name="submit" value="Create Category" class="btn btn-primary">
            </div>
        </form>
    </div>


    <div class=" col-lg-8">
        <h1 class="justify-center">/Category Table</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Delete Category </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($cat as $cat )   
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->created_at->diffForHumans() }}</td>
                <td>{{ $cat->updated_at->diffForHumans() }}</td>
                <td><a href="{{route('delete_category', $cat->id) }}" class=" btn btn-danger">Delete</a></td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>

@stop




