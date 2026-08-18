<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/" class="flex flex-row items-center justify-center gap-3 mb-2">
        <img src="{{ asset('images/logo-app.png') }}" alt="Logo Disnakertrans" class="h-10 object-contain">
        <div class="h-7 w-px bg-gray-300"></div>
        <img src="{{ asset('logo-didingklik-dark.png') }}" alt="Logo Didingklik" class="h-9 object-contain">
      </a>
    </x-slot>

    <div class="p-3 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 border border-blue-200">
      <div class="font-bold mb-1">📌 Akses Khusus Admin / Petugas</div>
      <div>Halaman login ini khusus untuk Admin & Petugas Disnakertrans. Pengguna umum/pencari kerja silakan gunakan layanan melalui aplikasi atau portal website <strong>Didingklik</strong>.</div>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
          autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
          autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Remember Me -->
      <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox"
            class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
          <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
      </div>

      <div class="flex items-center justify-between mt-4">
        <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none" href="/">
          &larr; Kembali ke Beranda
        </a>

        <button type="submit" class="ml-3 btn btn-primary">
          Log in Admin
        </button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>