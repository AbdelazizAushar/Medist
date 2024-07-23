<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // public function createInvoice(Request $request) {
    //     $orders = Order::whereIn('id', $request->id)->get();
    //     $data = [
    //         'orders' => $orders
    //     ];

    //     $pdf = Pdf::loadView('invoice', $data);
    //     return $pdf->stream();
    // }

    public function createInvoice(Request $request)
    {
        $warehouse = auth()->guard('sanctum')->user();
        $orders = Order::betweenDates([$request->start, $request->end])
            ->where('warehouse_id', $warehouse->id)->get();
        $data = [
            'orders' => $orders,
            'start_date' => $request->start,
            'end_date' => $request->end,
        ];

        $pdf = Pdf::loadView('invoice-dashboard', $data);
        $pdf->save(storage_path('app/public/invoice' . $warehouse->id . '.pdf'));

        return response()->json([
            'url' => url('storage/invoice' . $warehouse->id . '.pdf')
        ]);
    }
}
