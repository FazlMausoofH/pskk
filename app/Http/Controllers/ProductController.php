<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $no = 1;
        return view('product', ['products' => $products, 'no' => $no]);
    }
    public function create(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            Product::create([
                "code" => $request->input('code'),
                "name" => $request->input('name'),
                "selling_price" => $request->input('selling_price'),
                "purchase_price" => $request->input('purchase_price'),
                "unit" => $request->input('unit'),
                "category" => $request->input('category'),
                'image' => $this->upload($request, 'image'),
            ]);
            DB::commit();
            return redirect('product');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('/')->with('error', $th->getMessage());
        }
    }
    public function edit(Request $request, $id)
    {
        // dd($request->file('image'));
        try {
            $product = Product::find($id);
            if($product){
                $product->code = $request->input('code');
                $product->name = $request->input('name');
                $product->selling_price = $request->input('selling_price');
                $product->purchase_price = $request->input('purchase_price');
                $product->unit = $request->input('unit');
                $product->category = $request->input('category');
                if ($request->hasFile('image')) {
                    $product->image = $this->upload($request, 'image');
                }
                $product->save();
                return redirect('product');
            }
        } catch (\Throwable $th) {
            return redirect('/')->with('error', $th->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            Product::find($id)->delete();
            return redirect('product');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', $th->getMessage());
        }
    }
    public function upload(Request $request, $inputName)
    {
        $path = $request->file($inputName)->store('public');
        $url = Storage::url($path);
        return $url;
    }
}
