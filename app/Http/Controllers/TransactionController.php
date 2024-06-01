<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        // $products = Product::all()->map(function ($product) {
        //     $product->selling_price = number_format($product->selling_price, 0, ',', '.');
        //     return $product;
        // });
        $products = Product::all();

        return view('transaction', ['products' => $products]);
    }

    public function create(Request $request)
    {
        try {
            // Membersihkan input dari koma dan titik sebagai pemisah ribuan
            $cleanPay = str_replace([',', '.'], '', $request->input('pay'));
            $pay = (int)$cleanPay; // Mengubah input menjadi integer
    
            $object = $request->input('object');
            $total = 0;
            $detail = []; 
    
            foreach ($object as $productId => $qty) {
                $data = Product::find($productId);
                if ($data && $qty > 0) {
                    $productName = $data->name;
                    $productPrice = $data->selling_price;
                    $productStock = $data->stock;
    
                    // Memeriksa stok produk
                    if ($qty > $productStock) {
                        return redirect('transaction')->with('error', 'Stok ' . $productName . ' tidak mencukupi!');
                    }
    
                    $total += $productPrice * $qty;
    
                    $detail[] = [
                        "id" => $productId,
                        "name" => $productName,
                        "selling_price" => $productPrice,
                        "quantity" => $qty,
                    ];
                }
            }
    
            if ($pay < $total) {
                return redirect('transaction')->with('error', 'Nominal Pembayaran Kurang!');
            }
    
            // Mengurangi stok produk
            foreach ($detail as $item) {
                $product = Product::find($item['id']);
                $product->stock -= $item['quantity'];
                $product->save();
            }
    
            Transaction::create([
                "detail" => json_encode($detail),
                "customer_name" => $request->input('customer_name'),
                "order_id" => Carbon::now()->setTimezone('asia/jakarta')->format('YmdHis'),
                "pay" => $pay,
                "total" => $total,
                "return" => $pay - $total,
                "status" => true,
            ]);
    
            // Set success message in session
            return redirect('transaction')->with('success', 'Transaksi berhasil!');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', $th->getMessage());
        }
    }
    
}
