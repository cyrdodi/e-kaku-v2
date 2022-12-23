<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Edit') }}
    </h2>
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