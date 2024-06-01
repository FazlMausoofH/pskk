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
            "email" => "fazl@gmail.com",
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
                'image' => '/storage/S4wKetcc33626uptgCdaaMWXtaOpXgZT9VEWIZSi.jpg',
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
                'image' => '/storage/EwbrfyCicIbgj0GvoALsUFTuQcL2S69HIMERavPM.jpg',
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
                'image' => '/storage/AXFMgPbagAcvx66xbfxPZ3iINCrXf2s9cqM5SNhI.jpg',
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
                'image' => '/storage/m1q6z7qMW13PsPEADO4HVhzDEFBhwlQU4Vvvgx42.png',
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
                'image' => '/storage/Wkb7Wm2U4uweCNAtc4oZkpdmh2FSqqgTugzw9uqT.jpg',
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
                'image' => '/storage/WcZtSxyXhfEp1fpVGQSZAzwFnDuAZ4sHWEjWy1Ki.jpg',
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
                'image' => '/storage/wOIi3TvYyh3uyc8nkTPqI614aRdsT4KbGxAvsaLi.jpg',
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
                'image' => '/storage/ZIvHSM8QjI5zBaWOlK6anuPWZdcUwaTokCWt2H3z.jpg',
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
                'image' => '/storage/jlfSfujZndvMxL6DXcQnNRI8Xmg3zoRkgc9fRkdq.jpg',
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
                'image' => '/storage/uDoP3wvGRqHZLawsmN6rxAgqUUB2nvm5BSCbO59G.jpg',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ]);
    }
}
