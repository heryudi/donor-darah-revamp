@extends('layouts.app')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Pendaftaran Donor Baru
        </h3>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
        <form action="{{ route('donors.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Name -->
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                </div>

                <!-- Gender -->
                <div class="sm:col-span-3">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <div class="mt-1">
                        <select id="gender" name="gender" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- Birth Date -->
                <div class="sm:col-span-3">
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <div class="mt-1">
                        <input type="date" name="birth_date" id="birth_date" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                </div>

                 <!-- Phone -->
                <div class="sm:col-span-3">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
                    <div class="mt-1">
                        <input type="text" name="phone" id="phone" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>


                <!-- Address -->
                <div class="sm:col-span-6">
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                    <div class="mt-1">
                        <textarea id="address" name="address" rows="3" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="house_number" class="block text-sm font-medium text-gray-700">Nomor Rumah</label>
                    <div class="mt-1">
                         <input type="text" name="house_number" id="house_number" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                 <div class="sm:col-span-2">
                    <label for="rt_rw" class="block text-sm font-medium text-gray-700">RT/RW</label>
                    <div class="mt-1">
                         <input type="text" name="rt_rw" id="rt_rw" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                
                 <div class="sm:col-span-2">
                    <label for="village" class="block text-sm font-medium text-gray-700">Kelurahan</label>
                    <div class="mt-1">
                         <input type="text" name="village" id="village" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                
                 <div class="sm:col-span-3">
                    <label for="district" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                    <div class="mt-1">
                         <input type="text" name="district" id="district" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                 <div class="sm:col-span-3">
                    <label for="region" class="block text-sm font-medium text-gray-700">Wilayah</label>
                    <div class="mt-1">
                         <input type="text" name="region" id="region" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                 <div class="sm:col-span-6">
                    <label for="occupation" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                    <div class="mt-1">
                        <select id="occupation" name="occupation" class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="TNI/POLRI">TNI/POLRI</option>
                            <option value="PEGAWAI NEGERI/SWASTA">Pegawai Negeri/Swasta</option>
                            <option value="MAHASISWA/PELAJAR">Mahasiswa/Pelajar</option>
                            <option value="PETANI/BURUH">Petani/Buruh</option>
                            <option value="WIRASWASTA">Wiraswasta</option>
                            <option value="LAIN-LAIN">Lain-lain</option>
                        </select>
                    </div>
                </div>

            </div>

             <div class="pt-5">
                <div class="flex justify-end">
                <a href="{{ route('donors.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Batal
                </a>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Simpan
                </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
