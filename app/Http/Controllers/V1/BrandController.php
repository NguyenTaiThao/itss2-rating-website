<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\ApiResourceController;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends ApiResourceController
{
    protected function setModel()
    {
        $this->model = new Brand();
    }

    public function accept(Brand $brand)
    {
        try {

            $brand->is_active = true;
            $brand->save();
            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'not ok'], 500);
        }
    }
    public function reject(Brand $brand)
    {
        try {
            $brand->delete();
            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'not ok'], 500);
        }
    }
}