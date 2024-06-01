@extends('layout.main')

@section('title', 'Transaction')

@section('content')
<div class="p-6 sm:ml-64">
    <div class="relative bg-white overflow-x-auto p-12">
        @if (session('success'))
            <script>
                alert('{{ session('success') }}');
            </script>
        @endif

        @if (session('error'))
            <script>
                alert('{{ session('error') }}');
            </script>
        @endif

        <form action="{{ route('create-transaction') }}" method="post" class="w-full mx-auto">
            @csrf
            <div class="grid grid-cols-4 gap-5 text-white">
                @foreach ($products as $product)
                    <div class="border-2 whitespace-nowrap">
                        <img src="{{ $product->image }}" class="w-full h-40 mb-2" alt="">
                        <div class="text-center">
                            <label for="text" class="text-black text-xl">{{ $product->name }} (Rp{{ number_format($product->selling_price, 0, ',', '.') }}) : </label>
                            <input type="number" name="object[{{ $product->id }}]" class="w-10 text-black border-2 p-1 border-black" min="0" onchange="calculateSubtotal()">
                        </div>
                        <span class="selling-price-{{ $product->id }}" style="display: none;">{{ $product->selling_price }}</span>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-between mt-8">
                <div class="flex justify-start w-full">
                    <div class="mr-5">
                        <label for="" class="text-xl font-semibold">Nama Customer : </label>
                        <input type="text" name="customer_name" class="border-2 border-black py-1 p-1">
                    </div>
                    <div class="mr-5">
                        <label for="" class="text-xl font-semibold">Nominal Pembayaran : </label>
                        <input type="text" name="pay" class="border-2 border-black py-1 p-1" onkeyup="formatCurrency(this)">
                    </div>
                </div>
                <div class="w-1/3">
                    <button type="submit" class="bg-blue-600 text-white p-3 text-xl hover:bg-blue-700">Bayar Pesanan</button>
                    <div class="mt-3">
                        <span class="text-2xl font-semibold">Total : <span class="subtotal">0</span></span>
                    </div>
                </div>                
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
        // Fungsi untuk menghitung subtotal setiap kali nilai input berubah
        function calculateSubtotal() {
            var total = 0; // Inisialisasi total keseluruhan

            // Loop melalui setiap input jumlah barang
            document.querySelectorAll('input[name^="object"]').forEach(function(input) {
                var qty = input.value; // Jumlah barang
                if (qty > 0) {
                    var productId = input.name.split('[')[1].split(']')[0]; // ID produk dari atribut name input
                    var sellingPrice = document.querySelector(`.selling-price-${productId}`).innerText; // Harga jual

                    total += qty * sellingPrice; // Menambahkan subtotal dari produk ini ke total keseluruhan
                }
            });

            // Memformat total menjadi format mata uang Indonesia
            var formattedTotal = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(total);

            // Menampilkan total pada elemen subtotal
            document.querySelector('.subtotal').innerText = formattedTotal;
        }

        // Fungsi untuk memformat nominal pembayaran
        function formatCurrency(input) {
            // Menghapus karakter selain angka
            var value = input.value.replace(/\D/g, "");

            // Mengubah angka menjadi format dengan pemisah ribuan
            var formattedValue = new Intl.NumberFormat("id-ID").format(value);

            // Menetapkan nilai yang diformat kembali ke input
            input.value = formattedValue;
        }

        // Event listener untuk setiap input jumlah barang
        document.querySelectorAll('input[name^="object"]').forEach(function(input) {
            input.addEventListener('change', calculateSubtotal);
        });
@endsection
