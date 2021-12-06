@extends('layouts.app', ['title' => __('User Manager')])

@section('content')
<div class="main-content">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="album py-5 bg-white">
        <div class="container">
            <div class="card d-flex justify-content-center align-items-center p-5">
                <div class="d-flex justify-content-center align-items-center mb-3" style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark text-success" style="font-size: 90px;">✓</i>
                </div>
                <h1>成功しました</h1>
                <span>新規登録のリクエストをいただきました。</span>
                <span>出来るだけ早く返事します。お待ちください。</span>
                <div>
                    <a class="btn btn-outline-success mt-3" href="{{route('home')}}">ホームページ</a>
                    <a class="btn btn-info mt-3" href="{{route('brand.login')}}">ログイン</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection