@extends('layout.main')

@section('title', 'Transaction')

@section('content')
<div class="p-6 sm:ml-64">
    <div class="relative bg-white overflow-x-auto p-12">
       <div class="flex justify-between mb-5">
            <div class="w-full">
                <div class="p-5 mt-20">
                    <form action="{{ route('transaction.addProduct') }}" method="GET">
                        <label for="code_barang" class="text-xl font-semibold">Kode Barang : </label>
                        <input type="text" name="code_barang" id="code_barang" class="border-2 border-black py-1 p-2" required>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-white font-semibold rounded transition duration-300 ease-in-out uppercase py-1.5 px-2 w-20 text-md">Cari</button>
                    </form>
                </div>
            </div>
            <div class="w-2/5">
                <div class="bg-slate-200 p-5 shadow text-center">
                    <label class="font-semibold text-2xl">Total Pembelian = <span id="total-pembelian">0</span></label>
                </div>
                <div class="flex justify-between p-2 mt-2">
                    <div>
                        <label class="text-lg">Nama Pembeli</label>
                    </div>
                    <div>
                        <span class="mr-2 font-semibold">:</span><input type="text" id="customer-name" class="border-2 border-black py-1">
                    </div>
                </div>
                <div class="flex justify-between p-2 mt-2">
                    <div>
                        <label class="text-lg">Total Bayar</label>
                    </div>
                    <div>
                        <span class="mr-2 font-semibold">:</span><input type="number" id="pay-amount" class="border-2 border-black py-1" required>
                    </div>
                </div>
                <div class="mt-1">
                    <button type="button" onclick="saveOrder()" class="w-full py-2.5 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-white font-semibold rounded transition duration-300 ease-in-out uppercase">Bayar</button>
                </div>
            </div>
       </div>
       <div>
            <table class="w-full text-sm text-center rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Code</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">QTY</th>
                        <th scope="col" class="px-6 py-3">Harga</th>
                        <th scope="col" class="px-6 py-3">Total</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody id="product-table-body">
                    @if(session()->has('cart'))
                        @foreach(session('cart') as $index => $product)
                            @include('components.product-row', ['product' => $product, 'rowIndex' => $index + 1])
                        @endforeach
                    @endif
                </tbody>                        
            </table>
       </div>
    </div>
</div>
@endsection

@section('scripts')
    document.addEventListener('DOMContentLoaded', function() {
        let qtyInputs = document.querySelectorAll('.qty-input');

        qtyInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                updateTotalFromQtyInput(this);
            });
        });
        updateTotalPembelian(); // Call this function to update the total on page load
    });

    function updateTotalFromQtyInput(input) {
        let row = input.closest('tr');
        let qty = parseInt(input.value);
        let price = parseFloat(row.cells[4].textContent);
        let totalCell = row.querySelector('.total-cell');
        let total = qty * price;
        totalCell.textContent = formatTotal(total);
        updateTotalPembelian();
    }

    function updateTotalPembelian() {
        let tableBody = document.getElementById('product-table-body');
        let total = 0;
        for (let row of tableBody.rows) {
            total += parseFloat(row.querySelector('.total-cell').textContent);
        }
        document.getElementById('total-pembelian').textContent = formatTotal(total);
    }

    function formatTotal(total) {
        return total.toFixed(0); // Removed decimal places
    }

    function deleteRow(button) {
        let row = button.closest('tr');
        let code = row.querySelector('td:nth-child(2)').textContent;

        fetch("{{ route('transaction.removeProduct') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ code: code })
        }).then(response => response.json()).then(data => {
            if (data.success) {
                row.remove();
                updateTotalPembelian();
            }
        }).catch(error => console.error('Error:', error));
    }

    function saveOrder() {
        let customerName = document.getElementById('customer-name').value;
        let payAmount = parseFloat(document.getElementById('pay-amount').value);

        fetch("{{ route('transaction.saveOrder') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ customer_name: customerName, pay: payAmount })
        }).then(response => response.json()).then(data => {
            if (data.success) {
                alert('Order saved successfully');
                window.location.reload();
            } else {
                alert('Failed to save order');
            }
        }).catch(error => console.error('Error:', error));
    }
@endsection
