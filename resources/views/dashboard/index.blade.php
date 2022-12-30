<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      {{-- stats --}}
      <div class="mb-6 mr-4 shadow stats">
        <div class="stat">
          <div class="stat-title">Total Pendaftaran</div>
          <div class="stat-value">{{ $countRegisteredYearly }}</div>
          <div class="stat-desc">Tahun {{ date('Y') }}</div>
        </div>
      </div> {{-- end stats --}}
      {{-- stats --}}
      <div class="mb-6 shadow stats">
        <div class="stat">
          <div class="stat-title">Total Tercetak</div>
          <div class="stat-value">{{ $countPrintedYearly }}</div>
          <div class="stat-desc">Tahun {{ date('Y') }}</div>
        </div>
      </div> {{-- end stats --}}
      @livewire('dashboard.list-kartu-pencari-kerja')
    </div>
  </div>
</x-app-layout>