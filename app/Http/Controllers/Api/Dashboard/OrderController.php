<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardOrderDetailsResource;
use App\Http\Resources\DashboardOrderResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Pharmacist;
use App\Traits\SendNotification;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use SendNotification;

    public function index(Request $request) {
        $status = [
            'pending' => 'Pending',
            'being-prepared' => 'Being Prepared',
            'on-the-way' => 'On The Way',
            'delivered' => 'Delivered',
            'rejected' => 'Rejected',
        ];

        $warehouse = auth()->guard('sanctum')->user();
        $orders = $warehouse->orders;
        if($request->filter){
            $orders = $warehouse->orders->where('status', $status[$request->filter]);
        }
        if(sizeof($orders) == 0) {
            return response()->json([
                'message' => 'No Orders Found',
            ],404);
        }
        return response()->json([
            'message' => 'Orders Retrieved',
            'count' => count($orders),
            'orders' => DashboardOrderResource::collection($orders)
        ]);
    }

    public function show(Order $order) {
        if($order->warehouse_id != auth()->guard('sanctum')->user()->id) {
            return response()->json([
                'message' => 'Not Authorized To See This Order',
            ],404);
        }
        return response()->json([
            'message' => 'Order Retrieved',
            'orders' => new DashboardOrderDetailsResource($order)
        ]);
    }

    public function changeStatus(Request $request, Order $order){
        if($order->warehouse_id != auth()->guard('sanctum')->user()->id) {
            return response()->json([
                'message' => 'Not Authorized To See This Order',
            ],404);
        }
        $order->status = $request->status;
        if($request->status == 'On The Way') {
            foreach($order->medicines as $medicine) {
                $medicine->dose->quantity->available -= $medicine->quantity;
                $medicine->dose->quantity->sold += $medicine->quantity;
                $medicine->dose->quantity->save();
            }
        }
        if($request->status == 'Delivered') {
            $order->delivered_at = now();
        }
        $order->save();
        $pharmacist = Pharmacist::find($order->pharmacist_id);
        $this->sendNotification('Order Status Changed','Your Order Is ' . $request->status, $pharmacist);
        return response()->json([
            'message' => 'Status Updated'
        ],200);
    }

    public function changePaymentStatus(Request $request, Order $order){
        if($order->warehouse_id != auth()->guard('sanctum')->user()->id) {
            return response()->json([
                'message' => 'Not Authorized To See This Order',
            ],404);
        }
        $order->payment_status = $request->payment_status;
        // 0 for not paid
        // 1 for paid
        $order->save();
        return response()->json([
            'message' => 'Payment Status Updated'
        ],200);
    }

    public function changeOrderStatus(Request $request, Order $order){
        if($order->warehouse_id != auth()->guard('sanctum')->user()->id) {
            return response()->json([
                'message' => 'Not Authorized To See This Order',
            ],404);
        }
        $order->is_accepted = $request->is_accepted;
        // 0 for rejected
        // 1 for accepted
        $pharmacist = Pharmacist::find($order->pharmacist_id);
        if($request->is_accepted == 1) {
            $order->status = 'Preparing';
            $order->save();
            $this->sendNotification('Order Status Changed','Your Order Has Been Accepted', $pharmacist);
            return response()->json([
                'message' => 'Order Accepted'
            ],200);
        }
        $order->save();
        $this->sendNotification('Order Status Changed','Your Order Has Been Rejected', $pharmacist);
        return response()->json([
            'message' => 'Order Rejected'
        ],400);
    }

    public function checkPossibility(Order $order){
        if($order->warehouse_id != auth()->guard('sanctum')->user()->id) {
            return response()->json([
                'message' => 'Not Authorized To See This Order',
            ],404);
        }
        $possible = [];
        $check = true;
        foreach($order->medicines as $medicine) {
            if($medicine->quantity <= $medicine->dose->quantity->available) {
                $possible[] = true;
            }
            else {
                $possible[] = false;
                $check = false;
            }
        }
        if($check) {
            return response()->json([
                'message' => 'Order Can Be Accepted',
                'possibility' => $possible
            ],200);
        }
        return response()->json([
            'message' => 'Order Cant Be Accepted',
            'possibility' => $possible
        ],200);
    }

    public function rejectedOrders() {
        $warehouse = auth()->guard('sanctum')->user();
        $orders = $warehouse->orders->where('is_accepted', 0);
        if(sizeof($orders) == 0) {
            return response()->json([
                'message' => 'No Rejected Orders Found',
            ],404);
        }
        return response()->json([
            'message' => 'Rejected Orders Retrieved',
            'count' => count($orders),
            'orders' => OrderResource::collection($orders)
        ]);
    }
}
