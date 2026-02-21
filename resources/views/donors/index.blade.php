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
                            @php
                                $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            @endphp
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                                    {{ $bulan[$i - 1] }}
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
        <div class="p-8">
            <!-- Success Message -->
            <div class="flex items-center justify-center mb-6">
                <svg class="h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 text-center mb-2">
                {{ count($donors) }} data pendonor ditemukan
            </h3>

            <!-- Privacy Notice -->
            <div class="bg-blue-50 border-l-4 border-blue-400 p-6 mb-8 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-xl font-medium text-blue-800">
                            Untuk melindungi privasi Anda, silakan verifikasi identitas
                        </p>
                        <p class="text-lg text-blue-700 mt-1">
                            Masukkan 4 angka terakhir nomor HP Anda yang terdaftar
                        </p>
                    </div>
                </div>
            </div>

            <!-- Verification Forms -->
            <div class="space-y-6">
                @foreach($donors as $index => $donor)
                <div class="bg-gray-50 border-2 border-gray-200 rounded-xl p-6">
                    <div class="mb-4">
                        @php
                            $nameParts = explode(' ', trim($donor->name));
                            $maskedNameParts = [];
                            foreach ($nameParts as $part) {
                                $len = strlen($part);
                                if ($len <= 2) {
                                    $expose = 1;
                                } elseif ($len <= 4) {
                                    $expose = 2;
                                } else {
                                    $expose = 3;
                                }
                                $maskedNameParts[] = substr($part, 0, $expose) . str_repeat('*', max(0, $len - $expose));
                            }
                            $maskedName = implode(' ', $maskedNameParts);
                        @endphp
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900">{{ $maskedName }}</h4>
                                <p class="text-lg text-gray-600 mt-1">Lahir: {{ $donor->birth_date->format('d F Y') }}</p>
                                @if($donor->donor_card_number)
                                <p class="text-lg text-gray-600">No. Kartu Donor: {{ $donor->donor_card_number }}</p>
                                @endif
                            </div>
                            <button type="button" id="btn_select_{{ $donor->id }}" onclick="document.getElementById('verify_form_{{ $donor->id }}').style.display='block'; this.style.display='none';" class="px-6 py-3 border border-transparent shadow-sm text-lg font-bold rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Pilih
                            </button>
                        </div>
                    </div>

                    <form id="verify_form_{{ $donor->id }}" style="display: none;" action="{{ route('donors.verify', $donor) }}" method="POST" class="mt-6 space-y-4 border-t-2 border-gray-200 pt-6">
                        @csrf
                        <div>
                            <label for="phone_verify_{{ $donor->id }}" class="block text-lg font-medium text-gray-700 mb-2">
                                4 Angka Terakhir No. HP Anda
                            </label>
                            <input
                                type="text"
                                id="phone_verify_{{ $donor->id }}"
                                name="phone_verify"
                                maxlength="4"
                                pattern="[0-9]{4}"
                                inputmode="numeric"
                                class="block w-full text-2xl py-4 px-6 border-2 @if($errors->getBag('verify_' . $donor->id)->has('phone_verify')) border-red-500 @else border-gray-300 @endif bg-white rounded-xl shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500"
                                placeholder="****"
                                value="{{ old('phone_verify') }}"
                                required
                            >
                            @if($errors->getBag('verify_' . $donor->id)->has('phone_verify'))
                            <p class="mt-2 text-lg text-red-600">{{ $errors->getBag('verify_' . $donor->id)->first('phone_verify') }}</p>
                            @endif
                        </div>

                        <div class="flex gap-4">
                            <button type="button" onclick="document.getElementById('verify_form_{{ $donor->id }}').style.display='none'; document.getElementById('btn_select_{{ $donor->id }}').style.display='block';" class="w-1/3 flex justify-center items-center py-4 px-6 border border-gray-300 shadow-sm text-xl font-bold rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Batal
                            </button>
                            <button type="submit" class="w-2/3 flex justify-center items-center py-4 px-6 border border-transparent shadow-lg text-xl font-bold rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                🔐 VERIFIKASI
                            </button>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>

            <!-- Back Link -->
            <div class="mt-8 text-center">
                <a href="{{ route('donors.index') }}" class="text-xl text-red-600 hover:text-red-800 font-medium">
                    ← Kembali ke Pencarian
                </a>
            </div>
        </div>
        @else
        <div class="p-12 text-center">
            <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-4 text-2xl font-medium text-gray-900">Data Tidak Ditemukan</h3>
            <p class="mt-2 text-xl text-gray-500">Maaf, data dengan tanggal lahir tersebut tidak ditemukan.</p>
            <div class="mt-8">
                <a href="{{ route('donors.create', ['day' => request('day'), 'month' => request('month'), 'year' => request('year')]) }}" class="inline-flex items-center justify-center px-8 py-6 border border-transparent text-2xl font-bold rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-blue-500 shadow-xl w-full md:w-auto">
                    📝 DAFTAR BARU
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endif
@endsection
