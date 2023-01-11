@extends('layouts.app')

@section('content')

 <!-- Blog Post -->



             <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                    <div class=" content">
                        @foreach($posts as $post)

                        <h1> {{$post->user->name}}</h1>
                        <h3>{{$post->cat->name ?? $post->category_id}}</h3>
                        <h4><a href="{{route('signal_post',$post->id)}}">{{$post->title}}</a></h4>
                        <img src="{{asset('storage/images/post_images/'.$post->image)}}" alt="image" height="auto" width="auto">
                        <p>{{$post->body}}</p>
                        <p>{{$post->created_at->diffForHumans()}}</p>

                      @endforeach
                      {{
                        $posts->links('pagination::bootstrap-5');
                      }}
                    </div>
               <hr>

                <div class="well">

                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST" action="{{route('save_comment','2')}}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="leave comment ...." name="body" required></textarea>


                        </div>
                       <div class=" form-group">
                            <input type="submit" class=" btn btn-primary">
                       </div>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    @yield('comment')

                </div>



            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well  py-2 bg-white m-3">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well bg-white m-3">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">

                                @foreach($cat as $cat)
                                <li><a href="#">{{$cat->name}}</a>
                                @endforeach


                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well bg-white m-3">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
    </div>


@stop

<!--  category -->
