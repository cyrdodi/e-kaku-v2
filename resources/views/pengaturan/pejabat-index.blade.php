<x-layouts.app>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Pejabat Penandatangan') }}
      </h2>

      <x-breadcrumb :links="[
        ['url' =>  route('pengaturan.index'), 'name' => 'Pengaturan']
        ]" current="Pejabat Penandatangan" />

    </div>
  </x-slot>

  <div class="py-10">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <x-card>
        <div class="flex justify-end">
          <x-link-button class="btn-primary" :href="route('pengaturan.pejabat.create')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Pejabat Baru
          </x-link-button>
        </div>

        <livewire:pengaturan.table-pejabat />
      </x-card>
    </div>
  </div>
</x-layouts.app>