<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function createInvoice(Request $request)
    {
        // $orders = Order::whereIn('id', $request->id)->get();
        $order = Order::find((int)$request->id);
        $pharmacist = auth()->guard('sanctum')->user();
        $data = [
            'order' => $order,
            'pharmacist' => $pharmacist
        ];

        $pdf = Pdf::loadView('invoice', $data);
        $pdf->save(storage_path('app/public/pharmacist-invoice' . $pharmacist->id . '.pdf'));
        return response()->json([
            'url' => Storage::url('pharmacist-invoice' . $pharmacist->id . '.pdf')
        ]);
    }
}
