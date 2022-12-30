<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">

      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Edit') }}
      </h2>
      <x-breadcrumb :links="array(
            ['url' =>  route('dashboard.index'), 'name' => 'Dashboard'],
            ['url' =>  route('dashboardShow', ['biodata' => $biodata]), 'name' => 'Detail']
        )" current="Edit" />
    </div>
  </x-slot>

  <div class="container py-12 mx-auto">
    <div>
      <div class="flex justify-center ">
        <div class="w-full mt-6 bg-white max-w-7xl card">
          <livewire:biodata.edit-form :biodata="$biodata" />
        </div>
      </div>
    </div>
  </div>
</x-app-layout>