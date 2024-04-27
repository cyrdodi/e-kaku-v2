<x-layouts.app>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Tambah Biodata') }}
      </h2>
      <x-breadcrumb :links="[
            ['url' =>  route('dashboard.index'), 'name' => 'Dashboard']
            ]" current="Tambah Biodata" />
    </div>
  </x-slot>

  <div class="container py-12 mx-auto">
    <div>
      <div class="flex justify-center ">
        <div class="w-full  max-w-7xl card">
          <div class="card-body">
            {{-- @livewire('biodata.create-form') --}}
            <livewire:biodata.biodata-create />
          </div>

        </div>
      </div>
    </div>
  </div>
</x-layouts.app>