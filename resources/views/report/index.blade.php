<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Report') }}
      </h2>
      <x-breadcrumb :links="[
            // ['url' =>  route('biodata.index'), 'name' => 'Biodata'],
            // ['url' =>  route('biodata.show'), 'name' => 'Detail'],
            ]" current="Report" />
    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      @livewire('report.report-list')
    </div>
  </div>
</x-app-layout>