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
                                <tr>
                                    <td>Nike 1011</td>
                                    <td>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    </td>
                                    <td>12/02/2020 11:00</td>
                                    <td>
                                        <img src="https://static.nike.com/a/images/f_auto,b_rgb:f5f5f5,w_880/fb7eda3c-5ac8-4d05-a18f-1c2c5e82e36e/blazer-mid-77-vintage-shoe-dNWPTj.png" class="w-100" alt="">
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="">Edit</a>
                                                <a class="dropdown-item" href="">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Nike 2011</td>
                                    <td>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    </td>
                                    <td>12/02/2020 11:00</td>
                                    <td>
                                        <img src="https://static.nike.com/a/images/f_auto,b_rgb:f5f5f5,w_880/b3cfc983-ec31-49a7-bbe1-c21764e0f355/blazer-mid-77-vintage-shoe-dNWPTj.png" class="w-100" alt="">
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="">Edit</a>
                                                <a class="dropdown-item" href="">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-center" aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
</div>
@endsection