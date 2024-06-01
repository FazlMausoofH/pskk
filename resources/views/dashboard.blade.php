@extends('layout.main')

@section('content')
    <div class="p-6 sm:ml-64">
        <div class="relative bg-white overflow-x-auto p-12">
            <div class="grid grid-cols-3 gap-8 mx-32">
                {{-- ...... --}}
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <div class="pt-6 px-6">
                        <div>
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Total Barang</h5>
                        </div>
                        <div class="text-center my-7">
                            <p class="mb-3 font-bold text-gray-700 text-5xl">{{ $productCount }}</p>
                        </div>
                    </div>
                    <div class="w-full bg-blue-700">
                        <a href="{{ url('product') }}" class="inline-flex items-center px-3 py-2 text-xl font-medium text-center text-white rounded-lg ">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- .... --}}
                {{-- ...... --}}
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <div class="pt-6 px-6">
                        <div>
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Total Stock</h5>
                        </div>
                        <div class="text-center my-7">
                            <p class="mb-3 font-bold text-gray-700 text-5xl">{{ $totalStock }}</p>
                        </div>
                    </div>
                    <div class="w-full bg-blue-700">
                        <a href="{{ url('product') }}" class="inline-flex items-center px-3 py-2 text-xl font-medium text-center text-white rounded-lg ">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- .... --}}
                {{-- ...... --}}
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <div class="pt-6 px-6">
                        <div>
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Total Transaksi</h5>
                        </div>
                        <div class="text-center my-7">
                            <p class="mb-3 font-bold text-gray-700 text-5xl">{{ $transactionCount }}</p>
                        </div>
                    </div>
                    <div class="w-full bg-blue-700">
                        <a href="{{ url('dashboard') }}" class="inline-flex items-center px-3 py-2 text-xl font-medium text-center text-white rounded-lg ">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- .... --}}
            </div>
            <div class="mt-10">
                <h2 class="text-center text-4xl font-semibold mb-5">Riwayat Transaksi</h2>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                order id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                customer name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                pay
                            </th>
                            <th scope="col" class="px-6 py-3">
                                return
                            </th>
                            <th scope="col" class="px-6 py-3">
                                status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                created_at
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $no++ }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $transaction->order_id }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $transaction->customer_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $transaction->total }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->pay }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->return }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->status }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->created_at }}
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <!-- Modal toggle -->
                                <button data-modal-target="detail-transaction-{{ $transaction->id }}" data-modal-toggle="detail-transaction-{{ $transaction->id }}" class="font-medium text-lime-600 hover:underline" type="button">
                                    Detail
                                </button>
                                <!-- Main modal -->
                                <div id="detail-transaction-{{ $transaction->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow p-4">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                <h3 class="text-lg font-semibold text-gray-900">
                                                    Detail Transaction
                                                </h3>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="grid grid-cols-2 gap-4">
                                                @foreach (json_decode($transaction->detail, true) as $data)
                                                <div class="border-2 border-black text-xl p-3">
                                                    <label for="">Name : {{ $data['name'] }}</label><br>
                                                    <label for="">Price : {{ $data['selling_price'] }}</label><br>
                                                    <label for="">Quantity : {{ $data['quantity'] }}</label><br>
                                                </div>
                                                @endforeach
                                            </div>                                                                            
                                            <div class="text-2xl font-semibold text-center mt-2">
                                                <label for="">Total : Rp{{ $transaction->total }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <button data-modal-target="delete-transaction-{{ $transaction->id }}" data-modal-toggle="delete-transaction-{{ $transaction->id }}" class="font-medium text-red-600 hover:underline ms-3" type="button">
                                    Delete
                                </button>
                                
                                <div id="delete-transaction-{{ $transaction->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this transaction?</h3>
                                                <form action="{{ route('delete-transaction', $transaction->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection