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
                                <h3 class="mb-0">Spam Reviews</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('brand.review')}}" class="btn btn-sm btn-primary">Recent reviews</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Review point</th>
                                    <th scope="col">Review content</th>
                                    <th scope="col">Reviewer</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($reviews) == 0)
                                <tr>
                                    <td colspan="6" class=" w-100">
                                        <p class="alert alert-lighter text-center text-bold">There is no spam review</p>
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
                                        <span class="badge bg-danger text-white">spam</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a onclick="return confirmDelete('選択したレビューのスパムを削除しますか？')" class="dropdown-item" href="{{route('brand.review.markAsUnspam',['review'=>$review->id])}}">Mark as unspam</a>
                                                <a onclick="return confirmDelete('選択したレビューを削除しますか？')" class="dropdown-item" href="{{route('brand.review.delete',['review'=>$review->id])}}">Delete</a>
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