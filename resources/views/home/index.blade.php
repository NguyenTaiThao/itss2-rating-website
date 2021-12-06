@extends('layouts.app', ['title' => __('User Manager')])

@section('content')
<div class="main-content">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <section class="text-center">
                <div class="container">
                    <h1 class="jumbotron-heading text-white">ブランドの良さを人々に示しましょう </h1>
                    <p class="lead text-light">以下のコレクションについて、短くて先導的なもの—その内容、作成者など。短くて甘いものにしますが、短すぎないようにして、人々が単にそれを完全にスキップしないようにします。</p>
                    <p>
                        <a href="{{route('home')}}" class="btn btn-primary my-2">すべてのレビューを見る</a>
                        <a href="" class="btn btn-secondary my-2">あなたの気持ちを述べる</a>
                    </p>
                </div>
            </section>
        </div>
    </div>
    <div class="album py-5 bg-white">
        <div class="container">
            <form method="get">
                <div class="row mb-3 bg-light align-items-center" style="height: 90px;">
                    <div class="col-md-4">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="探索" type="text" name="keyword" value="{{request()->get('keyword')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                            <select value="{{request()->get('product_category_id')}}" id="product_category_id" name="product_category_id" class="form-control">
                                <option selected value="">製品のカテゴリを選択してください</option>
                                @foreach($productTypes as $productType)
                                <option value="{{$productType->id}}" {{request()->get('product_category_id') == $productType->id ? "selected" : ""}}>{{$productType->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_category_id'))
                            <div class="text-danger">{{ $errors->first('product_category_id') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success text-white">
                            <i class="fas fa-search"></i>フィルターする
                        </button>
                    </div>
                </div>
            </form>
            <div class="row">
                @if(count($posts) == 0)
                <div class="alert alert-lighter d-flex justify-content-center w-100">
                    <p>ポストがありません。</p>
                </div>
                @endif
                @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card mb-4 box-shadow h-100">
                        <a href="{{route('post.show',['post'=>$post->id])}}">
                            <img class="card-img-top" src="storage/{{$post->img_url}}" alt="post logo" style="height: 225px; width: 100%; display: block;" data-holder-rendered="true">
                        </a>
                        <div class="card-body position-relative">
                            <h5 class="card-title">{{$post->title}}</h5>

                            <p class="card-text">{{substr($post->content, 0, 100)}}...</p>
                            <div class="row w-100 d-flex align-items-center position-absolute" style="bottom:10px">
                                <div class="col-6 btn-group pl-0">
                                    <a href="{{route('post.show',['post'=>$post->id])}}" class="btn btn-sm btn-outline-secondary">詳細</a>
                                    <a href="{{route('post.review', ['post'=>$post->id])}}" class="btn btn-sm btn-outline-secondary">レビューを作成する</a>
                                </div>
                                <div class="col-6 text-right d-inline-block">
                                    @if($post->rating_point > 0)
                                    <input type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" value={{$post->rating_point}} readonly="true">
                                    @else
                                    <span class="text-light">未評価</span>
                                    @endif
                                </div>
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