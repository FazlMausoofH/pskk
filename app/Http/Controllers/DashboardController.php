<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $transaction = Transaction::where('status', true)->get();
        $this->format($transaction);
        $no = 1;
    
        // Menghitung jumlah data produk
        $productCount = Product::count();
        $transactionCount = Transaction::count();
        $totalStock = Product::sum('stock');
    
        return view('dashboard', ['transactions' => $transaction, 'no' => $no, 'productCount' => $productCount, 'transactionCount' => $transactionCount, 'totalStock' => $totalStock]);
    }
    
    public function delete($id)
    {
        try {
            Transaction::find($id)->delete();
            return redirect('dashboard');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', $th->getMessage());
        }
    }
    private function format($reports)
    {
        // Loop melalui setiap laporan
        $columnsToFormat = ['total', 'pay', 'return'];
        // Lakukan pencarian berdasarkan rentang tanggal
        foreach ($reports as $report) {
            // Loop melalui setiap kolom yang ingin diformat
            foreach ($columnsToFormat as $column) {
                // Lakukan pengecekan apakah kolom tersebut ada dalam laporan
                if (isset($report->{$column})) {
                    // Ubah format nilai kolom menjadi ribuan
                    $report->{$column} = number_format($report->{$column}, 0, ',', '.');
                }
            }
        }
        return $report;
    }
}
