<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      {{-- stats --}}
      <div class="mb-6 shadow stats">
        <div class="stat">
          <div class="stat-title">Total Pendaftaran</div>
          <div class="stat-value">89,400</div>
          <div class="stat-desc">Tahun 2022</div>
        </div>
      </div> {{-- end stats --}}
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
        </div>
      </div>
    </div>
  </div>
</x-app-layout>