<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\ApiResourceController;
use App\Models\Post;

class PostController extends ApiResourceController
{
    protected function setModel()
    {
        $this->model = new Post();
    }
}
