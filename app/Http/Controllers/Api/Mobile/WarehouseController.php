<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\WarehouseResource;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index() {
        $warehouses = Warehouse::all();
        return response()->json([
            'warehouses' => WarehouseResource::collection($warehouses)
        ], 200);
    }
}
