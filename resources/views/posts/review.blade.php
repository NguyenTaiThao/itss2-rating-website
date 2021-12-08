@extends('layouts.app', ['title' => __('Post review')])

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
                </div>
                <div class="col-12 mt-4">
                    <p>
                        {{$post->content}}
                    </p>
                </div>
            </div>

            <form method="post" class="row mt-5 pt-5">
                @csrf
                <div class="col-md-12">
                    <h3>この投稿についてどう思いますか？</h3>
                </div>

                <div class="col-md-12">
                    <input name="rating" type="number" class="rating" min=0 max=5 step=0.5 data-size="lg"
                        value="{{old('rating')}}">
                    @if($errors->has('rating'))
                    <div class="text-danger">{{ $errors->first('rating') }}</div>
                    @endif
                    <div class="mt-2">
                        <textarea rows=5 class="form-control w-100" name="content">{{old('content')}}</textarea>
                        @if($errors->has('content'))
                        <div class="text-danger">{{ $errors->first('content') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 text-center mt-3">
                    <button type="reset" class="btn btn-md btn-secondary">リセット</button>
                    <button type="submit" class="btn btn-md btn-primary">送信</button>
                </div>
            </form>
        </div>
        @endsection