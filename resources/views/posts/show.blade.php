@extends('layouts.app', ['title' => __('Post show')])

@section('content')
<div class="main-content">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
        </div>
    </div>
    <div class="album py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="card-img-top" alt="Thumbnail [100%x225]" style="width: 100%; display: block;"
                        src="{{asset('storage/'.$post->img_url)}}" data-holder-rendered="true">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h1>{{$post->title}}</h1>
                    <input type="number" class="rating" min=0 max=5 data-size="lg" value={{$post->rating_point}}
                        readonly="true">
                    <small class="text-muted d-inline-block">{{$post->rating_time}} 評価回数</small>
                    <div>
                        <a href="{{route('post.review', ['post'=>$post->id])}}" class="btn btn-info mt-4">レビューを作成する</a>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <p>
                        {{$post->content}}
                    </p>
                </div>
                <div class="col-6">
                    <span　 class="text-muted">カテゴリー：{{$post->productCategory->name}}</span>
                </div>
                <div class="col-6 text-right">
                    <span class="text-muted">
                        作家：{{$post->brand->name}}
                    </span>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-12 mb-3">
                    <form method="get" class="w-100 d-flex justify-content-end ">
                        <select class="form-select form-control d-inline-block mr-2" style="width: 200px !important;"
                            aria-label="Default select example" name="star_filter">
                            <option value="">レビューのフィルタ</option>
                            <option value="1" {{request()->get('star_filter') == 1 ? 'selected' : ''}}>
                                <span>星の１つ</span>
                            </option>
                            <option value="2" {{request()->get('star_filter') == 2 ? 'selected' : ''}}>
                                星の２つ</i>
                            </option>
                            <option value="3" {{request()->get('star_filter') == 3 ? 'selected' : ''}}>
                                星の３つ
                            </option>
                            <option value="4" {{request()->get('star_filter') == 4 ? 'selected' : ''}}>
                                星の４つ
                            </option>
                            <option value="5" {{request()->get('star_filter') == 5 ? 'selected' : ''}}>
                                星の５つ
                            </option>
                        </select>
                        <button class="btn btn-success" type="submit">探索する</button>
                    </form>
                </div>
                @if(count($reviews) == 0)
                <a href="{{route('post.review', ['post'=>$post->id])}}"
                    class="alert alert-light w-100 text-center text-white">レビューがまだありません。レビューを作成しましょう。</a>
                @endif

                @foreach($reviews as $review)
                <div class="col-12 mb-5">
                    <div class="card shadow-lg">
                        <h5 class="card-header bg-lighter py-2">{{$review->user->name}}</h5>
                        <div class="card-body  py-2">
                            <input type="number" class="rating" min=0 max=5 step=0.5 data-size="sm"
                                value={{$review->rating}} readonly="true">
                            <p class="card-text">{{$review->content}}</p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($review->comments as $comment)
                        <div class="col-11 offset-1 mt-1">
                            <div class="shadow-lg">
                                <div class="row">
                                    <div class="col-2  bg-lighter d-flex justify-content-center align-items-center">
                                        <span class=" bg-lighter py-2"><i class="fas fa-reply"></i>
                                            {{$comment->user->name}}</span>
                                    </div>
                                    <div class="col-9">
                                        <div class="card-body  py-2">
                                            <p class="card-text">{{$comment->content}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-11 offset-1 mt-1 pl-0">
                            <form method="POST" action="{{route('comment.reply')}}">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        placeholder="{{$review->user->name}}のレビューへ返事する" name="content">
                                    <input type="hidden" name="review_id" value="{{$review->id}}">
                                    <button class="btn btn-outline-primary" type="submit">返事</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-12">
                    <nav aria-label="Page navigation" class="d-flex justify-content-center">
                        {{ $reviews->links("pagination::bootstrap-4") }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @endsection