<x-app-layout>
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto px-6 lg:px-8 space-y-8">
            
            <!-- Update Profile Information -->
            <section class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Profil</h3>
                    <p class="mt-1 text-sm text-gray-600">Perbarui nama dan alamat email akun Anda.</p>
                </div>
                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </section>

            <!-- Update Password -->
            <section class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    <h3 class="text-lg font-medium text-gray-900">Ubah Kata Sandi</h3>
                    <p class="mt-1 text-sm text-gray-600">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.</p>
                </div>
                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-password-form')
                </div>
            </section>

            <!-- Delete Account -->
            <section class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    <h3 class="text-lg font-medium text-red-600">Hapus Akun</h3>
                    <p class="mt-1 text-sm text-gray-600">Setelah akun Anda dihapus, semua data akan hilang secara permanen.</p>
                </div>
                <div class="p-4 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
