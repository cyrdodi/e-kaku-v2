<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Pengaturan') }}
    </h2>
  </x-slot>

  <div class="py-10">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <x-card>
        <livewire:pengaturan.create-pejabat />
      </x-card>
    </div>
  </div>
</x-app-layout>