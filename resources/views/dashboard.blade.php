@extends('layout.main')

@section('content')
    <div class="p-6 sm:ml-64">
        <div class="relative bg-white overflow-x-auto p-12">
            <div class="grid grid-cols-4 gap-8">
                @for ($i = 1; $i <= 4; $i++)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <div class="pt-6 px-6">
                        <div>
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Nama Barang</h5>
                        </div>
                        <div class="text-center my-7">
                            <p class="mb-3 font-bold text-gray-700 text-5xl">10</p>
                        </div>
                    </div>
                    <div class="w-full bg-blue-700">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-xl font-medium text-center text-white rounded-lg ">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection