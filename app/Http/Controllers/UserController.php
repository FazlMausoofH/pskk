<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $no = 1;
        $headers = ['no','name','email','phone', 'created_at','action'];
        return view('user', ['users' => $users, 'headers' => $headers, 'no' => $no]);
    }
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
            ]);
            DB::commit();
            return redirect('/user');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage()); // Tambahkan ini untuk mencetak pesan kesalahan dalam log
            return redirect('/user');
        }
    }
    public function edit(Request $request, $id)
    {
        // dd($request->file('image'));
        try {
            $user = User::find($id);
            if($user){
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->phone = $request->input('phone');
                if ($request->input('password')) {
                    $user->password = Hash::make($request->input('password'));
                }
                $user->save();
                return redirect('user');
            }
        } catch (\Throwable $th) {
            return redirect('/')->with('error', $th->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            User::find($id)->delete();
            return redirect('user');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', $th->getMessage());
        }
    }
}
