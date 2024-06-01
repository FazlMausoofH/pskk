<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "Fazl Mausoof H",
            "email" => "fazlmausoof08@gmail.com",
            "phone" => "082125215079",
            "password" => Hash::make(12345),
        ]);
        $timestamp = now();
        DB::table('products')->insert([
            [
                'code' => 'SP001',
                'name' => 'Oli Mesin',
                'selling_price' => 100000,
                'purchase_price' => 85000,
                'unit' => 'liter',
                'category' => 'Pelumas',
                'stock' => 12,
                'image' => '/storage/Y21qhbxBtidxV7rdLvQZoaF3Xtza67A087DCdEEv.jpg',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'code' => 'SP002',
                'name' => 'Filter Udara',
                'selling_price' => 75000,
                'purchase_price' => 60000,
                'unit' => 'pcs',
                'category' => 'Filter',
                'stock' => 22,
                'image' => '/storage/Uhhm0j9EFzuY8i1IcdafACnaztqsnodD3GEcCHVd.jpg',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'code' => 'SP003',
                'name' => 'Busi',
                'selling_price' => 30000,
                'purchase_price' => 25000,
                'unit' => 'pcs',
                'category' => 'Sistem Pengapian',
                'stock' => 23,
                'image' => '/storage/gXrQEdU4He59bw4tNP4M75bhhQGj1zK29wHuBINS.jpg',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'code' => 'SP004',
                'name' => 'Aki',
                'selling_price' => 500000,
                'purchase_price' => 450000,
                'unit' => 'pcs',
                'category' => 'Elektrikal',
                'stock' => 41,
                'image' => '/storage/bJn4OTO23Wdsns5N0h4MkTpnddcKMIK2OTmvSZGA.png',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'code' => 'SP005',
                'name' => 'Rem Cakram',
                'selling_price' => 150000,
                'purchase_price' => 120000,
                'unit' => 'set',
                'category' => 'Sistem Pengereman',
                'stock' => 51,
                'image' => '/storage/zCH4QOQTVALKUKUY6OyNqj7fHxSuZxqUdYJ17kC1.jpg',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'code' => 'SP006',
                'name' => 'Rantai Motor',
                'selling_price' => 200000,
                'purchase_price' => 170000,
                'unit' => 'pcs',
                'category' => 'Sistem Transmisi',
                'stock' => 72,
                'image' => '/storage/5zYSIf5vO0V0iotnNEeenBiqeu1dnQRpZAVwPupI.jpg',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'code' => 'SP007',
                'name' => 'Lampu Depan',
                'selling_price' => 80000,
                'purchase_price' => 65000,
                'unit' => 'pcs',
                'category' => 'Elektrikal',
                'stock' => 10,
                'image' => '/storage/53OKWzRLL8bEcl8465OKq1SJYdyny38cXzOe6OYP.jpg',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'code' => 'SP008',
                'name' => 'Kabel Gas',
                'selling_price' => 50000,
                'purchase_price' => 40000,
                'unit' => 'pcs',
                'category' => 'Sistem Kontrol',
                'stock' => 27,
                'image' => '/storage/pvyumTfwbPSgaj6AhxfpQYqXNCsrYhWSCoLl3L2F.jpg',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'code' => 'SP009',
                'name' => 'Ban Luar',
                'selling_price' => 300000,
                'purchase_price' => 250000,
                'unit' => 'pcs',
                'category' => 'Sistem Roda',
                'stock' => 31,
                'image' => '/storage/PLcMTFEQW620JbGCCaPItc5ZDn2X5joPpyAxHcE4.jpg',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'code' => 'SP010',
                'name' => 'Shock Absorber',
                'selling_price' => 350000,
                'purchase_price' => 300000,
                'unit' => 'pcs',
                'category' => 'Suspensi',
                'stock' => 40,
                'image' => '/storage/NbzvQuXIV8xq4g209eknKMFeexH3eTBeF3nfXMo2.jpg',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ]);
    }
}
