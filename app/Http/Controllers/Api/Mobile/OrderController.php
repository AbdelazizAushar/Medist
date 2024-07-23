<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\MedicineDetails;
use App\Models\Order;
use App\Models\Warehouse;
use App\Traits\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use SendNotification;

    // public function addOrder(Request $request) {
    //     $pharmacist = Auth::guard('sanctum')->user();

    //     $order = $pharmacist->orders()->create();
    //     $sum = 0;

    //     foreach($request->except('warehouse_id') as $medicine){
    //         $medicine_dose = MedicineDetails::where('id', $medicine['dose_id'])->first();
    //         if($medicine['quantity'] > $medicine_dose->quantity->available) {
    //             $order->delete();
    //             return response()->json([
    //                 'message' => 'Not Enough Medicines'
    //             ],400);
    //         }
    //         $sum += ($medicine['quantity'] * $medicine['price']);
    //         $order->medicines()->create([
    //             'medicine_id' => $medicine['medicine_id'],
    //             'dose_id' => $medicine['dose_id'],
    //             'quantity' => $medicine['quantity'],
    //             'price' => $medicine['price'],
    //         ]);
    //         $medicine_dose->quantity->available -= $medicine['quantity'];
    //         $medicine_dose->quantity->sold += $medicine['quantity'];
    //         $medicine_dose->quantity->save();
    //     }
    //     $order->bill = $sum;
    //     $order->warehouse_id = request()->warehouse_id;
    //     $order->save();
    //     return response()->json([
    //         'message' => 'Added Order Successfully',
    //         'order' => new OrderResource($order)
    //     ],200);

    // }

    public function getOrders() {
        $pharmacist = Auth::guard('sanctum')->user();
        $orders = Warehouse::find(request()->warehouse_id)->orders->where('pharmacist_id', $pharmacist->id);
        return response()->json([
            'message' => 'Retrieved All Order Successfully',
            'order' => $orders->values()
        ],200);
    }

    public function getOrdersBeingPrepared() {
        $pharmacist = Auth::guard('sanctum')->user();
        $orders = Warehouse::find(request()->warehouse_id)->orders->where('pharmacist_id', $pharmacist->id)->where('status', '!=' ,'Delivered');
        return response()->json([
            'message' => 'Retrieved All Order Successfully',
            'order' => $orders->values()
        ],200);
    }

    public function getLatestOrder() {
        $pharmacist = Auth::guard('sanctum')->user();
        $pharmacistOrders = $pharmacist->orders->where('warehouse_id', request()->warehouse_id)->take(1);
        return response()->json([
            'message' => 'Retrieved Latest Order Successfully',
            'order' => $pharmacistOrders->values()
        ],200);
    }

    public function getOneOrder(string $id) {
        $pharmacist = Auth::guard('sanctum')->user();
        $order = Order::find($id);
        if($order->pharmacist_id != $pharmacist->id) {
            return response()->json([
                'message' => 'No Access To See This Order',
            ],404);
        }
        return response()->json([
            'message' => 'Retrieved Order Successfully',
            'order' => new OrderResource($order)
        ],200);
    }

    public function addOrder(Request $request) {
        $pharmacist = Auth::guard('sanctum')->user();
        $order = $pharmacist->orders()->create();
        $sum = 0;
        $cart = json_decode($request->cart);
        foreach($cart as $medicine){
            $sum += ($medicine->quantity * $medicine->price);
            $order->medicines()->create([
                'medicine_id' => $medicine->medicine_id,
                'dose_id' => $medicine->dose_id,
                'quantity' => $medicine->quantity,
                'price' => $medicine->price,
            ]);
        }
        $order->bill = $sum;
        $order->warehouse_id = request()->warehouse_id;
        $order->is_accepted = 0;
        $order->status = 'Pending';
        $order->save();
        $warehouse = Warehouse::find(request()->warehouse_id);
        $this->sendNotification('Order Received','New Order Has Been Recieved', $warehouse);
        return response()->json([
            'message' => 'Added Order Successfully',
            'order' => new OrderResource($order)
        ],200);
    }
}
