@extends('layout.main')

@section('title', 'Product')

@section('content')
    <div class="p-6 sm:ml-64">
        <div class="relative bg-white overflow-x-auto p-12">
            <div class="flex justify-end mb-4">
                <!-- Modal toggle -->
                <button data-modal-target="create-product" data-modal-toggle="create-product" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                    New Product
                </button>
                
                <!-- Main modal -->
                <div id="create-product" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Create New Product
                                </h3>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" action="{{ route('create-product') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-1">
                                        <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Code</label>
                                        <input type="text" name="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                    </div>
                                    <div class="col-span-1">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                        <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                                    </div>
                                </div>
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-1">
                                        <label for="selling_price" class="block mb-2 text-sm font-medium text-gray-900">Selling Price</label>
                                        <input type="number" name="selling_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                    </div>
                                    <div class="col-span-1">
                                        <label for="purchase_price" class="block mb-2 text-sm font-medium text-gray-900">Purchase Price</label>
                                        <input type="number" name="purchase_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-1">
                                        <label for="unit" class="block mb-2 text-sm font-medium text-gray-900">Unit</label>
                                        <input type="text" name="unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                    </div>
                                    <div class="col-span-1">
                                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                        <input type="text" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-1">
                                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                                        <input type="text" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                    </div>
                                    <div class="my-2">
                                        <label for="" class="block mb-2 text-sm font-medium text-gray-900">Image :</label>
                                        <input id="dropzone-file" name="image" type="file" class="" />
                                    </div>
                                </div>
                                <div class="flex justify-end mt-2">
                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 whitespace-nowrap">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            selling price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            purchase price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            unit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            image
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
                    @foreach ($products as $product)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">
                            {{ $no++ }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $product->code }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $product->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->selling_price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->purchase_price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->unit }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->category }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->stock }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ $product->image }}" class="w-10 h-10" alt="">
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->created_at }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <!-- Modal toggle -->
                            <button data-modal-target="edit-product-{{ $product->id }}" data-modal-toggle="edit-product-{{ $product->id }}" class="font-medium text-blue-600 hover:underline" type="button">
                                Edit
                            </button>
                            <!-- Main modal -->
                            <div id="edit-product-{{ $product->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                Edit New Product
                                            </h3>
                                        </div>
                                        <!-- Modal body -->
                                        <form class="p-4 md:p-5" action="{{ route('edit-product', $product->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-1">
                                                    <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Code</label>
                                                    <input type="text" name="code" value="{{ $product->code }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                                    <input type="text" name="name" value="{{ $product->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                                                </div>
                                            </div>
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-1">
                                                    <label for="selling_price" class="block mb-2 text-sm font-medium text-gray-900">Selling Price</label>
                                                    <input type="number" name="selling_price" value="{{ $product->selling_price }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="purchase_price" class="block mb-2 text-sm font-medium text-gray-900">Purchase Price</label>
                                                    <input type="number" name="purchase_price" value="{{ $product->purchase_price }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                                </div>
                                            </div>
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-1">
                                                    <label for="unit" class="block mb-2 text-sm font-medium text-gray-900">Unit</label>
                                                    <input type="text" name="unit" value="{{ $product->unit }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                                    <input type="text" name="category" value="{{ $product->category }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                                </div>
                                            </div>
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-1">
                                                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                                                    <input type="text" name="stock" value="{{ $product->stock }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                                </div>
                                                <div class="my-2">
                                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Image :</label>
                                                    <input id="dropzone-file" name="image" value="{{ $product->image }}" type="file" class="" />
                                                </div>
                                            </div>
                                            <div class="flex justify-end mt-2">
                                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Update
                                                </button>
                                            </div>
                                        </form>                                                                                
                                    </div>
                                </div>
                            </div> 
                            <button data-modal-target="delete-product-{{ $product->id }}" data-modal-toggle="delete-product-{{ $product->id }}" class="font-medium text-red-600 hover:underline ms-3" type="button">
                                Delete
                            </button>
                            
                            <div id="delete-product-{{ $product->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow">
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this product?</h3>
                                            <form action="{{ route('delete-product', $product->id) }}" method="post">
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
@endsection
@section('scripts')

@endsection