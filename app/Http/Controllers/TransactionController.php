<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction');
    }

    public function addProduct(Request $request)
    {
        $code = $request->input('code_barang');
        $product = Product::where('code', $code)->first();
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        $cart = session()->get('cart', []);
        if (isset($cart[$code])) {
            $cart[$code]['quantity'] += 1;
        } else {
            $cart[$code] = [
                'code' => $product->code,
                'name' => $product->name,
                'selling_price' => $product->selling_price,
                'quantity' => 1
            ];
        }
    
        session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Product added to cart');
    }    

    public function removeProduct(Request $request)
    {
        $code = $request->input('code');
        $cart = session()->get('cart', []);

        foreach ($cart as $index => $item) {
            if ($item['code'] === $code) {
                unset($cart[$index]);
                break;
            }
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }
    public function saveOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'No products in the cart']);
        }

        $orderDetails = [];
        $total = 0; // Variable to store total sales

        foreach ($cart as $item) {
            $itemTotal = $item['selling_price'] * $item['quantity']; // Assuming 'quantity' is a part of each item
            $orderDetails[] = [
                'code' => $item['code'],
                'name' => $item['name'],
                'price' => $item['selling_price'],
                'quantity' => $item['quantity'],
                'total' => $itemTotal
            ];
            $total += $itemTotal; // Add item's total to the overall total
        }

        $pay = floatval($request->input('pay'));
        $return = $pay - $total;

        Transaction::create([
            'detail' => json_encode($orderDetails),
            'customer_name' => $request->input('customer_name'),
            'order_id' => Carbon::now()->setTimezone('Asia/Jakarta')->format('YmdHis'),
            'total' => $total,
            'pay' => $pay,
            'return' => $return,
            'status' => true,
        ]);

        session()->forget('cart');

        return response()->json(['success' => true, 'message' => 'Order saved successfully']);
    }
}
