@extends('layouts.app', ['title' => __('User Manager')])

@section('content')
<div class="main-content">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">ポストの更新</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('brand.post')}}" class="btn btn-sm btn-primary">前のページに戻る</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">


                        <!-- start create form -->
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="title">タイトル</label>
                                            <input value="{{old('title', $post->title)}}" type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper" placeholder="タイトルを書いてください">
                                            @if($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="content">内容</label>
                                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{old('content', $post->content)}}</textarea>
                                            @if($errors->has('content'))
                                            <div class="text-danger">{{ $errors->first('content') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="product_category_id">製品のカテゴリ</label>
                                            <select value="{{old('product_category_id', $post->product_category_id)}}" id="product_category_id" name="product_category_id" class="form-control">
                                                <option selected disabled>製品のカテゴリを選択してください</option>
                                                @foreach($productTypes as $productType)
                                                <option value="{{$productType->id}}" {{old("product_category_id", $post->product_category_id) == $productType->id ? "selected" : ""}}>{{$productType->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('product_category_id'))
                                            <div class="text-danger">{{ $errors->first('product_category_id') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="content">画像</label>
                                            <div class="file-drop-area">
                                                <span class="choose-file-button">画像を選択してください</span>
                                                <span class="file-message">ここでファイルを選択またはドラッグアンドドロップして下さい</span>
                                                <input type="file" name="image" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif">
                                            </div>
                                            @if($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                        <div id="divImageMediaPreview">
                                            <img src="{{asset('storage/'.$post->img_url)}}" alt="post_image" style="width:100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="reset" class="btn btn-ouline-danger">キャンセル</button>
                                <button type="submit" class="btn btn-success">保存</button>
                            </div>
                        </form>
                    </div>
                    <!-- end create form -->
                    <div class="card-footer py-4 border-0">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
</div>
@endsection