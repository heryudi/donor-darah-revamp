@extends('layouts.app')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Edit Data Donor
        </h3>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
        @if(session('success'))
            <div class="rounded-md bg-green-50 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <!-- Heroicon name: solid/check-circle -->
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('donors.update', $donor) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Name -->
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" value="{{ old('name', $donor->name) }}" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                </div>

                <!-- Gender -->
                <div class="sm:col-span-3">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <div class="mt-1">
                        <select id="gender" name="gender" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="male" {{ $donor->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ $donor->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- Address -->
                <div class="sm:col-span-6">
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                    <div class="mt-1">
                        <textarea id="address" name="address" rows="3" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border border-gray-300 rounded-md">{{ old('address', $donor->address) }}</textarea>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="house_number" class="block text-sm font-medium text-gray-700">Nomor</label>
                    <input type="text" name="house_number" id="house_number" value="{{ old('house_number', $donor->house_number) }}" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>

                 <div class="sm:col-span-2">
                    <label for="rt_rw" class="block text-sm font-medium text-gray-700">RT/RW</label>
                    <input type="text" name="rt_rw" id="rt_rw" value="{{ old('rt_rw', $donor->rt_rw) }}" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
                
                 <div class="sm:col-span-2">
                    <label for="village" class="block text-sm font-medium text-gray-700">Kelurahan</label>
                    <input type="text" name="village" id="village" value="{{ old('village', $donor->village) }}" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
                
                 <div class="sm:col-span-2">
                    <label for="district" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                    <input type="text" name="district" id="district" value="{{ old('district', $donor->district) }}" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>

                 <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium text-gray-700">Wilayah</label>
                    <input type="text" name="region" id="region" value="{{ old('region', $donor->region) }}" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="sm:col-span-2">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $donor->phone) }}" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>

                 <div class="sm:col-span-3">
                    <label for="occupation" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                    <div class="mt-1">
                        <select id="occupation" name="occupation" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                             <option value="TNI/POLRI" {{ $donor->occupation == 'TNI/POLRI' ? 'selected' : '' }}>TNI/POLRI</option>
                            <option value="PEGAWAI NEGERI/SWASTA" {{ $donor->occupation == 'PEGAWAI NEGERI/SWASTA' ? 'selected' : '' }}>Pegawai Negeri/Swasta</option>
                            <option value="MAHASISWA/PELAJAR" {{ $donor->occupation == 'MAHASISWA/PELAJAR' ? 'selected' : '' }}>Mahasiswa/Pelajar</option>
                            <option value="PETANI/BURUH" {{ $donor->occupation == 'PETANI/BURUH' ? 'selected' : '' }}>Petani/Buruh</option>
                            <option value="WIRASWASTA" {{ $donor->occupation == 'WIRASWASTA' ? 'selected' : '' }}>Wiraswasta</option>
                            <option value="LAIN-LAIN" {{ $donor->occupation == 'LAIN-LAIN' ? 'selected' : '' }}>Lain-lain</option>
                        </select>
                    </div>
                </div>

                <!-- Advanced Fields -->
                 <div class="sm:col-span-3">
                    <label for="donor_card_number" class="block text-sm font-medium text-gray-700">No. Kartu Donor</label>
                    <input type="text" name="donor_card_number" id="donor_card_number" value="{{ old('donor_card_number', $donor->donor_card_number) }}" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>

                  <div class="sm:col-span-3">
                    <label for="awards" class="block text-sm font-medium text-gray-700">Penghargaan</label>
                     <select id="awards" name="awards" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="" {{ $donor->awards == '' ? 'selected' : '' }}>-</option>
                            <option value="10" {{ $donor->awards == '10' ? 'selected' : '' }}>10x</option>
                            <option value="25" {{ $donor->awards == '25' ? 'selected' : '' }}>25x</option>
                            <option value="50" {{ $donor->awards == '50' ? 'selected' : '' }}>50x</option>
                             <option value="75" {{ $donor->awards == '75' ? 'selected' : '' }}>75x</option>
                              <option value="100" {{ $donor->awards == '100' ? 'selected' : '' }}>100x</option>
                        </select>
                </div>
                
                 <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Bersedia Donor Puasa?</label>
                    <div class="mt-2 space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-red-600" name="willing_to_fast" value="1" {{ $donor->willing_to_fast ? 'checked' : '' }}>
                            <span class="ml-2">Ya</span>
                        </label>
                         <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-red-600" name="willing_to_fast" value="0" {{ !$donor->willing_to_fast ? 'checked' : '' }}>
                            <span class="ml-2">Tidak</span>
                        </label>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="last_donor_date" class="block text-sm font-medium text-gray-700">Donor Terakhir</label>
                    <input type="date" name="last_donor_date" id="last_donor_date" value="{{ old('last_donor_date', $donor->last_donor_date ? $donor->last_donor_date->format('Y-m-d') : '') }}" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>

                 <div class="sm:col-span-3">
                    <label for="total_donations" class="block text-sm font-medium text-gray-700">Total Donor Ke</label>
                    <input type="number" name="total_donations" id="total_donations" value="{{ old('total_donations', $donor->total_donations) }}" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>

            </div>

             <div class="pt-5">
                <div class="flex justify-between">
                     <button type="submit" name="queue" value="1" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Simpan & Cetak Nomor Antrian
                    </button>
                    <div class="flex justify-end">
                        <a href="{{ route('donors.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Batal
                        </a>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
