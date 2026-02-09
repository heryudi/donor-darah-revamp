@extends('layouts.app')

@section('content')
<div class="bg-white shadow-xl rounded-2xl overflow-hidden mx-4 pb-8">
    <div class="px-8 py-6 bg-red-600 border-b border-red-700">
        <h3 class="text-3xl font-extrabold text-white flex items-center">
            <svg class="h-10 w-10 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            Pendaftaran Donor Baru
        </h3>
    </div>
    
    <div class="px-8 py-8">
        <form action="{{ route('donors.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <!-- Personal Info Section -->
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                <h4 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Informasi Pribadi</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Name -->
                    <div class="col-span-1 md:col-span-2">
                        <label for="name" class="block text-xl font-bold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500" required>
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-xl font-bold text-gray-700 mb-2">Jenis Kelamin</label>
                        <div class="flex space-x-4">
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="gender" value="male" class="peer sr-only">
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 peer-checked:border-red-600 peer-checked:bg-red-50 hover:bg-gray-100 transition text-center">
                                    <span class="text-xl font-bold text-gray-700 peer-checked:text-red-700">Laki-laki</span>
                                </div>
                            </label>
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="gender" value="female" class="peer sr-only">
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 peer-checked:border-red-600 peer-checked:bg-red-50 hover:bg-gray-100 transition text-center">
                                    <span class="text-xl font-bold text-gray-700 peer-checked:text-red-700">Perempuan</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Birth Date -->
                    <div>
                        <label for="birth_date" class="block text-xl font-bold text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="birth_date" id="birth_date" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500" required>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-xl font-bold text-gray-700 mb-2">Telepon / HP</label>
                        <input type="tel" name="phone" id="phone" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                <h4 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Alamat & Pekerjaan</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Address -->
                    <div class="col-span-1 md:col-span-2">
                        <label for="address" class="block text-xl font-bold text-gray-700 mb-2">Alamat Jalan</label>
                        <textarea id="address" name="address" rows="2" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500"></textarea>
                    </div>

                    <!-- Details -->
                    <div>
                        <label for="house_number" class="block text-xl font-bold text-gray-700 mb-2">Nomor Rumah</label>
                        <input type="text" name="house_number" id="house_number" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                    <div>
                        <label for="rt_rw" class="block text-xl font-bold text-gray-700 mb-2">RT / RW</label>
                        <input type="text" name="rt_rw" id="rt_rw" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>

                    <div>
                        <label for="village" class="block text-xl font-bold text-gray-700 mb-2">Kelurahan</label>
                        <input type="text" name="village" id="village" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                    <div>
                        <label for="district" class="block text-xl font-bold text-gray-700 mb-2">Kecamatan</label>
                        <input type="text" name="district" id="district" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500">
                    </div>
                    <div>
                        <label for="region" class="block text-xl font-bold text-gray-700 mb-2">Wilayah / Kota</label>
                        <input type="text" name="region" id="region" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500" value="Bandung">
                    </div>

                    <!-- Occupation -->
                    <div>
                        <label for="occupation" class="block text-xl font-bold text-gray-700 mb-2">Pekerjaan</label>
                        <div class="relative">
                            <select id="occupation" name="occupation" class="block w-full text-2xl py-3 px-4 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-red-500 focus:border-red-500 appearance-none">
                                <option value="TNI/POLRI">TNI/POLRI</option>
                                <option value="PEGAWAI NEGERI/SWASTA">Pegawai Negeri/Swasta</option>
                                <option value="MAHASISWA/PELAJAR">Mahasiswa/Pelajar</option>
                                <option value="PETANI/BURUH">Petani/Buruh</option>
                                <option value="WIRASWASTA">Wiraswasta</option>
                                <option value="LAIN-LAIN">Lain-lain</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700">
                                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- Additional Questions -->
            <div class="bg-blue-50 p-6 rounded-xl border border-blue-200">
                <h4 class="text-xl font-bold text-blue-800 mb-6 border-b border-blue-200 pb-2">Pertanyaan Tambahan</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                     <!-- Fasting -->
                     <div class="col-span-1 md:col-span-2">
                        <label class="block text-xl font-bold text-gray-700 mb-4">Bersediakah saudara donor pada waktu bulan puasa?</label>
                         <div class="flex space-x-4">
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_fast" value="1" class="peer sr-only">
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 peer-checked:border-red-600 peer-checked:bg-red-50 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold text-gray-700 peer-checked:text-red-700">YA</span>
                                </div>
                            </label>
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_fast" value="0" class="peer sr-only" checked>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold text-gray-700 peer-checked:text-blue-700">TIDAK</span>
                                </div>
                            </label>
                        </div>
                     </div>

                     <!-- Mailing -->
                     <div class="col-span-1 md:col-span-2">
                        <label class="block text-xl font-bold text-gray-700 mb-4">Bersedia dikirim surat?</label>
                         <div class="flex space-x-4">
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_receive_mail" value="1" class="peer sr-only">
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 peer-checked:border-red-600 peer-checked:bg-red-50 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold text-gray-700 peer-checked:text-red-700">YA</span>
                                </div>
                            </label>
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_receive_mail" value="0" class="peer sr-only" checked>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold text-gray-700 peer-checked:text-blue-700">TIDAK</span>
                                </div>
                            </label>
                        </div>
                     </div>

                     <!-- Special Needs -->
                     <div class="col-span-1 md:col-span-2">
                        <label class="block text-xl font-bold text-gray-700 mb-4">Bersediakah saudara donor saat dibutuhkan untuk keperluan tertentu (diluar donor rutin)?</label>
                         <div class="flex space-x-4">
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_help_special_needs" value="1" class="peer sr-only">
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 peer-checked:border-red-600 peer-checked:bg-red-50 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold text-gray-700 peer-checked:text-red-700">YA</span>
                                </div>
                            </label>
                            <label class="flex-1 relative cursor-pointer">
                                <input type="radio" name="willing_to_help_special_needs" value="0" class="peer sr-only" checked>
                                <div class="px-6 py-4 rounded-lg border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:bg-gray-100 transition text-center">
                                    <span class="text-2xl font-bold text-gray-700 peer-checked:text-blue-700">TIDAK</span>
                                </div>
                            </label>
                        </div>
                     </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <a href="{{ route('donors.index') }}" class="inline-flex items-center px-8 py-4 border-2 border-gray-300 shadow-sm text-xl font-bold rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-red-500 transition">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-10 py-4 border border-transparent shadow-lg text-2xl font-extrabold rounded-xl text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-red-500 transition transform active:scale-95">
                    SIMPAN DATA 💾
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
