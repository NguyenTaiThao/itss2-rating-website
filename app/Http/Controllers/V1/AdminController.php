<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\ApiResourceController;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends ApiResourceController
{
    protected function setModel()
    {
        $this->model = new Admin();
    }

    public function store(Request $request)
    {
        $data = $request->only($this->model->getFillable());

        $data['password'] = Hash::make($data['password']);

        if (method_exists($this->model, 'adminCreate')) {
            $this->model->fill($data);
            $result = $this->model->adminCreate();
        } else {
            $result = $this->query->create($data);
        }
        return $this->createResultResponse($result);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (isset($data['id'])) {
            unset($data['id']);
        }
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $item = $this->query->where('id', $id)->first();
        if (!$item) {
            return response()->json(null, 404);
        }
        $item->fill($data);
        if (method_exists($item, 'adminUpdate')) {
            $result = $item->adminUpdate();
        } else {
            $result = $item->update();
        }
        return $this->resultResponse($result);
    }
}
