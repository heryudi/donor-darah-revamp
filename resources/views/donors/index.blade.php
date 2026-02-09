@extends('layouts.app')

@section('content')
<div class="bg-white shadow-xl rounded-2xl overflow-hidden mx-4">
    <div class="px-8 py-8 bg-gray-50 border-b border-gray-200">
        <h3 class="text-3xl font-bold text-gray-900 text-center">
            Cari Data Donor
        </h3>
        <p class="mt-2 text-xl text-gray-600 text-center">
            Masukkan Tanggal Lahir Anda
        </p>
    </div>
    
    <div class="p-8">
        <form action="{{ route('donors.index') }}" method="GET" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Day -->
                <div>
                    <label for="day" class="block text-2xl font-bold text-gray-700 mb-2">Tanggal</label>
                    <div class="relative">
                        <select id="day" name="day" class="block w-full text-2xl py-4 px-6 border-2 border-gray-300 bg-white rounded-xl shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500 appearance-none">
                            <option value="">Pilih Tgl</option>
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}" {{ request('day') == $i ? 'selected' : '' }} class="py-2">{{ $i }}</option>
                            @endfor
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700">
                            <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Month -->
                <div>
                    <label for="month" class="block text-2xl font-bold text-gray-700 mb-2">Bulan</label>
                    <div class="relative">
                        <select id="month" name="month" class="block w-full text-2xl py-4 px-6 border-2 border-gray-300 bg-white rounded-xl shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500 appearance-none">
                             <option value="">Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                </option>
                            @endfor
                        </select>
                         <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700">
                            <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Year -->
                <div>
                    <label for="year" class="block text-2xl font-bold text-gray-700 mb-2">Tahun</label>
                    <div class="relative">
                        <select id="year" name="year" class="block w-full text-2xl py-4 px-6 border-2 border-gray-300 bg-white rounded-xl shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500 appearance-none">
                             <option value="">Pilih Tahun</option>
                            @for ($i = 1940; $i <= date('Y'); $i++)
                                <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700">
                            <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <button type="submit" class="w-full flex justify-center py-6 px-8 border border-transparent shadow-lg text-3xl font-extrabold rounded-xl text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                    🔍 CARI DATA SAYA
                </button>
            </div>
        </form>
    </div>
</div>

@if(request()->has('day'))
<div class="bg-white shadow-xl rounded-2xl overflow-hidden mt-8 mx-4 border-2 border-red-100">
    <div class="px-8 py-6 bg-red-50 border-b border-red-200">
        <h3 class="text-2xl font-bold text-red-900">
            Hasil Pencarian
        </h3>
    </div>
    <div class="divide-y divide-gray-200">
        @if(count($donors) > 0)
        <ul class="divide-y divide-gray-200">
            @foreach($donors as $donor)
            <li class="p-8 hover:bg-red-50 transition duration-150 ease-in-out">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-3xl font-bold text-red-700 truncate">{{ $donor->name }}</p>
                        <p class="text-xl text-gray-600 mt-2">{{ $donor->address }}</p>
                        <p class="text-lg text-gray-500 mt-1">Lahir: {{ $donor->birth_date->format('d F Y') }}</p>
                    </div>
                    <div>
                        <a href="{{ route('donors.edit', $donor) }}" class="inline-flex items-center px-8 py-4 border border-transparent text-xl font-bold rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-green-500 shadow-lg transform active:scale-95 transition">
                            PILIH ✅
                        </a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <div class="p-12 text-center">
            <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-4 text-2xl font-medium text-gray-900">Data Tidak Ditemukan</h3>
            <p class="mt-2 text-xl text-gray-500">Maaf, data dengan tanggal lahir tersebut tidak ditemukan.</p>
            <div class="mt-8">
                 <a href="{{ route('donors.create') }}" class="inline-flex items-center justify-center px-8 py-6 border border-transparent text-2xl font-bold rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-blue-500 shadow-xl w-full md:w-auto">
                    📝 DAFTAR BARU
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endif
@endsection
