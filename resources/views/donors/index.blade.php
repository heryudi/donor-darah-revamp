@extends('layouts.app')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Cari Data Donor (Berdasarkan Tanggal Lahir)
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Masukkan tanggal lahir Anda untuk mencari data.
        </p>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
        <form action="{{ route('donors.index') }}" method="GET" class="p-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="day" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <select id="day" name="day" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
                        <option value="">-- Pilih --</option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}" {{ request('day') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label for="month" class="block text-sm font-medium text-gray-700">Bulan</label>
                    <select id="month" name="month" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
                         <option value="">-- Pilih --</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700">Tahun</label>
                    <select id="year" name="year" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
                         <option value="">-- Pilih --</option>
                        @for ($i = 1940; $i <= date('Y'); $i++)
                            <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Cari / Kirim
                </button>
            </div>
        </form>
    </div>
</div>

@if(request()->has('day'))
<div class="bg-white shadow overflow-hidden sm:rounded-lg mt-6">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Hasil Pencarian
        </h3>
    </div>
    <div class="border-t border-gray-200">
        @if(count($donors) > 0)
        <ul class="divide-y divide-gray-200">
            @foreach($donors as $donor)
            <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 flex justify-between items-center">
                <div>
                    <p class="text-sm font-medium text-red-600 truncate">{{ $donor->name }}</p>
                    <p class="text-sm text-gray-500">{{ $donor->address }}</p>
                </div>
                <div>
                    <a href="{{ route('donors.edit', $donor) }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Pilih
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <div class="px-4 py-5 sm:p-6 text-center text-gray-500">
            <p>Maaf, data tanggal lahir tidak ditemukan. Silahkan mendaftar baru.</p>
            <div class="mt-4">
                 <a href="{{ route('donors.create') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Daftar Baru
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endif
@endsection
