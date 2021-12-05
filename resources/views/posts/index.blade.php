@extends('layouts.app', ['title' => __('Posts')])

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
                                <h3 class="mb-0">Posts</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('brand.post.create')}}" class="btn btn-sm btn-primary">Add post</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col">Image</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($posts) == 0)
                                <tr>
                                    <td colspan="5" class=" w-100">
                                        <p class="alert alert-lighter text-center text-bold">There is no post</p>
                                    </td>
                                </tr>
                                @endif
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <div style="width:300px;overflow-wrap:break-word;white-space: normal;">
                                            {{$post->content}}
                                        </div>
                                    </td>
                                    <td> {{$post->created_at}}</td>
                                    <td>
                                        <img src="{{asset('storage/'.$post->img_url)}}" alt="post-image" style="width:200px;">
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{route('brand.post.edit',[$post->id])}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('brand.post.delete',[$post->id])}}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4 d-flex justify-content-center">
                        <div class="pagination-box">
                            {{ $posts->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
</div>
@endsection