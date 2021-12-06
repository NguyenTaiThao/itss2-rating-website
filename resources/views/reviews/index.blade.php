@extends('layouts.app', ['title' => __('Review Manager')])

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
                                <h3 class="mb-0">レビュー一覧</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('brand.review.spam')}}" class="btn btn-sm btn-primary">スパムレビューの一覧</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">デート</th>
                                    <th scope="col">ポスの内容ト</th>
                                    <th scope="col">評価点数</th>
                                    <th scope="col">レビューの内容</th>
                                    <th scope="col">レビューア</th>
                                    <th scope="col">ステータス</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($reviews) == 0)
                                <tr>
                                    <td colspan="6" class=" w-100">
                                        <p class="alert alert-lighter text-center text-bold">レビューがありません。</p>
                                    </td>
                                </tr>
                                @endif
                                @foreach($reviews as $review)
                                <tr>
                                    <td>{{$review->created_at}}</td>
                                    <td>{{$review->post->title}}</td>
                                    <td>
                                        {{$review->rating}}
                                        <i class="fas fa-star text-yellow"></i>
                                    </td>
                                    <td>
                                        {{$review->content}}
                                    </td>
                                    <td>{{$review->user->name}}</td>
                                    <td>
                                        <span class="badge bg-success text-white">ok</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a onclick="return confirmDelete('このレビューをスパムとしますか')" class="dropdown-item" href="{{route('brand.review.markAsSpam',['review'=>$review->id])}}">スパムとする</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-center" aria-label="...">
                            {{ $reviews->links("pagination::bootstrap-4") }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
</div>
@endsection