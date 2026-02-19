@extends('layouts.app')

@section('content')
<div class="bg-white shadow-xl rounded-2xl overflow-hidden mx-4 pb-8">
    <div class="px-8 py-6 bg-red-600 border-b border-red-700 flex justify-between items-center">
        <h3 class="text-3xl font-extrabold text-white flex items-center">
             <svg class="h-10 w-10 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit Data & Ambil Antrian
        </h3>
        <span class="bg-red-800 text-white px-4 py-1 rounded-full text-lg font-mono">{{ $donor->donor_card_number ?? 'TANPA KARTU' }}</span>
    </div>

    <div class="px-8 py-8">
        @if(session('success'))
            <div class="rounded-xl bg-green-100 p-6 mb-8 border-l-4 border-green-500">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-xl font-bold text-green-800">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('donors.update', $donor) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')
            
            <!-- Personal Info -->
             <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                 <h4 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Informasi Pribadi</h4>
                 <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="col-span-1 md:col-span-2">
                        <label for="name" class="block text-xl font-bold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $donor->name) }}" class="block w-full text-2xl py-3 px-4 border-2 @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500" required>
                        @error('name') <p class="mt-2 text-lg text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xl font-bold text-gray-700 mb-2">Jenis Kelamin</label>
                        <div class="flex space-x-4">
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="gender" value="male" class="peer sr-only" {{ old('gender', $donor->gender) == 'male' ? 'checked' : '' }}>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 text-gray-700 peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:text-green-700 hover:bg-gray-100 transition text-center">
                                    <span class="text-xl font-bold">Laki-laki</span>
                                </div>
                            </label>
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="gender" value="female" class="peer sr-only" {{ old('gender', $donor->gender) == 'female' ? 'checked' : '' }}>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 text-gray-700 peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:text-green-700 hover:bg-gray-100 transition text-center">
                                    <span class="text-xl font-bold">Perempuan</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                         <label for="phone" class="block text-xl font-bold text-gray-700 mb-2">Telepon / HP</label>
                         <input type="tel" name="phone" id="phone" value="{{ old('phone', $donor->phone) }}" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                </div>
            </div>

            <!-- Address -->
             <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                <h4 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Alamat</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                     <div class="col-span-1 md:col-span-2">
                        <label for="address" class="block text-xl font-bold text-gray-700 mb-2">Alamat Lengkap</label>
                        <textarea id="address" name="address" rows="2" class="block w-full text-2xl py-3 px-4 border-2 @error('address') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">{{ old('address', $donor->address) }}</textarea>
                        @error('address') <p class="mt-2 text-lg text-red-600">{{ $message }}</p> @enderror
                    </div>
                     <div>
                        <label for="house_number" class="block text-xl font-bold text-gray-700 mb-2">Nomor</label>
                        <input type="text" name="house_number" id="house_number" value="{{ old('house_number', $donor->house_number) }}" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                    <div>
                        <label for="rt_rw" class="block text-xl font-bold text-gray-700 mb-2">RT/RW</label>
                        <input type="text" name="rt_rw" id="rt_rw" value="{{ old('rt_rw', $donor->rt_rw) }}" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                    <div>
                        <label for="village" class="block text-xl font-bold text-gray-700 mb-2">Kelurahan</label>
                        <input type="text" name="village" id="village" value="{{ old('village', $donor->village) }}" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                    <div>
                        <label for="district" class="block text-xl font-bold text-gray-700 mb-2">Kecamatan</label>
                        <input type="text" name="district" id="district" value="{{ old('district', $donor->district) }}" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                     <div>
                        <label for="region" class="block text-xl font-bold text-gray-700 mb-2">Wilayah</label>
                        <input type="text" name="region" id="region" value="{{ old('region', $donor->region) }}" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                </div>
            </div>

            <!-- Donation Info -->
             <div class="bg-blue-50 p-6 rounded-xl border border-blue-200">
                 <h4 class="text-xl font-bold text-blue-800 mb-6 border-b border-blue-200 pb-2">Data Donor</h4>
                 <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                     <!-- Fasting -->
                     <div class="col-span-1 md:col-span-2">
                        <label class="block text-xl font-bold text-gray-700 mb-4">Bersediakah saudara donor pada waktu bulan puasa?</label>
                         <div class="flex space-x-4">
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_fast" value="1" class="peer sr-only" {{ old('willing_to_fast', $donor->willing_to_fast) ? 'checked' : '' }}>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 text-gray-700 peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:text-green-700 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold">YA</span>
                                </div>
                            </label>
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_fast" value="0" class="peer sr-only" {{ !old('willing_to_fast', $donor->willing_to_fast) ? 'checked' : '' }}>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 text-gray-700 peer-checked:border-red-600 peer-checked:bg-red-50 peer-checked:text-red-700 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold">TIDAK</span>
                                </div>
                            </label>
                        </div>
                     </div>

                     <!-- Mailing -->
                     <div class="col-span-1 md:col-span-2">
                        <label class="block text-xl font-bold text-gray-700 mb-4">Bersedia dikirim surat?</label>
                         <div class="flex space-x-4">
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_receive_mail" value="1" class="peer sr-only" {{ old('willing_to_receive_mail', $donor->willing_to_receive_mail) ? 'checked' : '' }}>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 text-gray-700 peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:text-green-700 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold">YA</span>
                                </div>
                            </label>
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_receive_mail" value="0" class="peer sr-only" {{ !old('willing_to_receive_mail', $donor->willing_to_receive_mail) ? 'checked' : '' }}>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 text-gray-700 peer-checked:border-red-600 peer-checked:bg-red-50 peer-checked:text-red-700 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold">TIDAK</span>
                                </div>
                            </label>
                        </div>
                     </div>

                     <!-- Special Needs -->
                     <div class="col-span-1 md:col-span-2">
                        <label class="block text-xl font-bold text-gray-700 mb-4">Bersediakah saudara donor saat dibutuhkan untuk keperluan tertentu (diluar donor rutin)?</label>
                         <div class="flex space-x-4">
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_help_special_needs" value="1" class="peer sr-only" {{ old('willing_to_help_special_needs', $donor->willing_to_help_special_needs) ? 'checked' : '' }}>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 text-gray-700 peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:text-green-700 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold">YA</span>
                                </div>
                            </label>
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_help_special_needs" value="0" class="peer sr-only" {{ !old('willing_to_help_special_needs', $donor->willing_to_help_special_needs) ? 'checked' : '' }}>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 text-gray-700 peer-checked:border-red-600 peer-checked:bg-red-50 peer-checked:text-red-700 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold">TIDAK</span>
                                </div>
                            </label>
                        </div>
                     </div>

                     <div>
                        <label class="block text-xl font-bold text-gray-700 mb-2">Penghargaan</label>
                        <div class="grid grid-cols-5 gap-4">
                            @foreach(['10', '25', '50', '75', '100'] as $award)
                            <label class="relative cursor-pointer">
                                <input type="checkbox" name="awards[]" value="{{ $award }}" class="peer sr-only" {{ in_array($award, $donor->awards ?? []) ? 'checked' : '' }}>
                                <div class="px-4 py-3 rounded-lg border-2 border-gray-300 text-gray-700 peer-checked:border-red-600 peer-checked:bg-red-50 peer-checked:text-red-700 hover:bg-gray-100 transition text-center">
                                    <span class="text-xl font-bold">{{ $award }}x</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label for="total_donations" class="block text-xl font-bold text-gray-700 mb-2">Total Donor Ke</label>
                        <input type="number" name="total_donations" id="total_donations" value="{{ old('total_donations', $donor->total_donations) }}" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                    
                    <div>
                        <label for="occupation" class="block text-xl font-bold text-gray-700 mb-2">Pekerjaan</label>
                        <div class="relative">
                            <select id="occupation" name="occupation" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500 appearance-none">
                                <option value="TNI/POLRI" {{ $donor->occupation == 'TNI/POLRI' ? 'selected' : '' }}>TNI/POLRI</option>
                                <option value="PEGAWAI NEGERI/SWASTA" {{ $donor->occupation == 'PEGAWAI NEGERI/SWASTA' ? 'selected' : '' }}>Pegawai Negeri/Swasta</option>
                                <option value="MAHASISWA/PELAJAR" {{ $donor->occupation == 'MAHASISWA/PELAJAR' ? 'selected' : '' }}>Mahasiswa/Pelajar</option>
                                <option value="PETANI/BURUH" {{ $donor->occupation == 'PETANI/BURUH' ? 'selected' : '' }}>Petani/Buruh</option>
                                <option value="WIRASWASTA" {{ $donor->occupation == 'WIRASWASTA' ? 'selected' : '' }}>Wiraswasta</option>
                                <option value="LAIN-LAIN" {{ $donor->occupation == 'LAIN-LAIN' ? 'selected' : '' }}>Lain-lain</option>
                            </select>
                             <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700">
                                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden fields required for update -->
                    <input type="hidden" name="donor_card_number" value="{{ $donor->donor_card_number }}">
                    <input type="hidden" name="last_donor_date" value="{{ $donor->last_donor_date ? $donor->last_donor_date->format('Y-m-d') : '' }}">

                 </div>
             </div>

            <div class="pt-8 pb-4 flex flex-col-reverse md:flex-row justify-between items-center gap-4">
                 <a href="{{ route('donors.index') }}" class="w-full md:w-auto inline-flex justify-center items-center px-8 py-4 border-2 border-gray-300 shadow-sm text-xl font-bold rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-red-500 transition">
                     <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Batal
                </a>

                <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                    <button type="submit" class="w-full md:w-auto inline-flex justify-center items-center px-8 py-4 border border-transparent shadow-lg text-xl font-bold rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-blue-500 transition">
                        Simpan Perubahan
                    </button>
                    
                    <button type="submit" name="queue" value="1" class="w-full md:w-auto inline-flex justify-center items-center px-10 py-4 border border-transparent shadow-lg text-2xl font-extrabold rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-green-500 transition transform active:scale-95">
                        AMBIL ANTRIAN & CETAK 🖨️
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
