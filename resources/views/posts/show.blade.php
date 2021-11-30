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
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22226%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20226%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17d7062a7bc%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17d7062a7bc%22%3E%3Crect%20width%3D%22348%22%20height%3D%22226%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7109375%22%20y%3D%22120.6875%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h1>Nike 1001</h1>
                    <span>
                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    </span>
                    <input name="input-name" type="number" class="rating" min=0 max=5 step=0.5 data-size="lg" value=4 readonly="true" showclear=false showcaption=false>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-12 mb-5">
                    <div class="card">
                        <h5 class="card-header bg-lighter py-2">User.ntg</h5>
                        <div class="card-body  py-2">
                            <input name="input-name" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm" value=2 readonly="true" showclear=false showcaption=false>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-5">
                    <div class="card">
                        <h5 class="card-header bg-lighter py-2">User.ntg</h5>
                        <div class="card-body  py-2">
                            <input name="input-name" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm" value=2 readonly="true" showclear=false showcaption=false>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-5">
                    <div class="card">
                        <h5 class="card-header bg-lighter py-2">User.ntg</h5>
                        <div class="card-body  py-2">
                            <input name="input-name" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm" value=2 readonly="true" showclear=false showcaption=false>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12">
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
    @endsection