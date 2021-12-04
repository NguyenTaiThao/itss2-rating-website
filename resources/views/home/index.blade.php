@extends('layouts.app', ['title' => __('User Manager')])

@section('content')
<div class="main-content">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <section class="text-center">
                <div class="container">
                    <h1 class="jumbotron-heading text-white">Show people how good brands are </h1>
                    <p class="lead text-light">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                    <p>
                        <a href="{{route('home')}}" class="btn btn-primary my-2">Explore all reviews</a>
                        <a href="" class="btn btn-secondary my-2">Write your feelings</a>
                    </p>
                </div>
            </section>
        </div>
    </div>
    <div class="album py-5 bg-white">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card mb-4 box-shadow h-100">
                        <a href="{{route('post.show',['post'=>$post->id])}}">
                            <img class="card-img-top" src="storage/{{$post->img_url}}" alt="post logo" style="height: 225px; width: 100%; display: block;" data-holder-rendered="true">
                        </a>
                        <div class="card-body position-relative">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{substr($post->content, 0, 100)}}...</p>
                            <div class="w-100 d-flex align-items-center position-absolute" style="bottom:10px">
                                <div class="btn-group">
                                    <a href="{{route('post.show',['post'=>$post->id])}}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{route('post.review', ['post'=>$post->id])}}" class="btn btn-sm btn-outline-secondary">Review product</a>
                                </div>
                                <small class="text-muted d-inline-block ml-5">{{date('Y年m月d日',strtotime($post->created_at))}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>


            <!-- navigator -->
            <nav aria-label="Page navigation" class="d-flex justify-content-center">
                {{ $posts->links("pagination::bootstrap-4") }}
            </nav>

        </div>
    </div>
</div>
@endsection