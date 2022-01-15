@extends('layouts.app', ['title' => __('User Manager')])

@section('content')
    <div class="main-content">
        <div class="header bg-gradient-primary pt-3 pt-md-7">
        </div>
        <div class="album py-5 bg-white">
            <div class="container-fluid">
                <form method="get">
                    <div class="row">
                        <div class="col-9">
                            <div class="row mb-3 align-items-center" style="height: 90px;">
                                <div class="col-md-4">
                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="探索" type="text" name="keyword"
                                                value="{{ request()->get('keyword') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <select value="{{ request()->get('product_category_id') }}"
                                            id="product_category_id" name="product_category_id" class="form-control">
                                            <option selected value="">製品のカテゴリを選択してください</option>
                                            @foreach ($productTypes as $productType)
                                                <option value="{{ $productType->id }}"
                                                    {{ request()->get('product_category_id') == $productType->id ? 'selected' : '' }}>
                                                    {{ $productType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('product_category_id'))
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
                        </div>

                        <!-- <div class="col-3 border-left border-white" style="border-left-width: 15px !important;">
                                                                        <div class="row mb-3 bg-light align-items-center d-flex justify-content-center"
                                                                            style="height: 90px;">
                                                                            <b class="text-white">気になっている商品</b>
                                                                        </div>
                                                                    </div> -->
                    </div>
                </form>

                <div class="row">
                    <div class="col-9">
                        <div class="row">

                            @if (count($posts) == 0)
                                <div class="alert alert-lighter d-flex justify-content-center w-100">
                                    <p>ポストがありません。</p>
                                </div>
                            @endif

                            @foreach ($posts as $post)
                                <div class="col-md-4 mb-4">
                                    <div class="card mb-4 box-shadow h-100 shadow-lg position-relative"
                                        style="border-width: 2px; border-color:#bbb">
                                        @if ($post->user_id == auth()->user()->id)
                                            <i class="fas fa-crown position-absolute text-success"
                                                style="top:5px; right:5px; font-size:30px"></i>
                                        @endif
                                        <a href="{{ route('brand.post.show', ['post' => $post->id]) }}">
                                            <img class="card-img-top" src="{{ asset('storage/' . $post->img_url) }}"
                                                alt="post logo" style="height: 225px; width: 100%; display: block;"
                                                data-holder-rendered="true">
                                        </a>
                                        <div class="card-body position-relative">
                                            <h5 class="card-title">{{ $post->title }}</h5>

                                            <!-- <p class="card-text">{{ substr($post->content, 0, 100) }}...</p> -->
                                            <span style="font-size:14px">カテゴリー：{{ $post->productCategory->name }}</span>
                                            <div class="row w-100 d-flex align-items-center position-absolute"
                                                style="bottom:10px">
                                                <div class="col-6 btn-group pl-0">
                                                    <a href="{{ route('brand.post.show', ['post' => $post->id]) }}"
                                                        class="btn btn-sm btn-outline-secondary  border-success">詳細</a>
                                                </div>
                                                <div class="col-6 text-right d-inline-block">
                                                    @if ($post->rating_point > 0)
                                                        <input type="number" class="rating" min=0 max=5 step=0.5
                                                            data-size="xs" value={{ $post->rating_point }}
                                                            readonly="true">
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
                    </div>

                    <div class="col-3 pl-5">
                        <div class="row bg-success text-white mb-3 d-flex justify-content-center align-items-center"
                            style="height: 30px;">
                            @if ($isTopVoting)
                                人気のある商品
                            @else
                                気になっている商品
                            @endif
                        </div>
                        @foreach ($suggests as $suggest)
                            <a href="{{ route('brand.post.show', ['post' => $suggest->id]) }}">
                                <div class="row mb-2 bg-light d-flex justify-content-center align-items-center"
                                    style="height: 120px;">
                                    <div class="col-5 px-0 d-flex align-items-center" style="overflow-y: hidden;"><img
                                            src="{{ asset('storage/' . $suggest->img_url) }}" alt="image"
                                            style="width:119px !important; height:119px !important"></div>
                                    <div class="col-7"><span
                                            style="font-size:small">{{ $suggest->title }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                        <!-- navigator -->
                        <!-- <nav aria-label="Page navigation" class="d-flex justify-content-center">
                                                                        {{ $suggests->links('pagination::bootstrap-4') }}
                                                                    </nav> -->
                    </div>
                </div>


                <!-- navigator -->
                <nav aria-label="Page navigation" class="d-flex justify-content-center">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </nav>

            </div>
        </div>
    </div>
@endsection
