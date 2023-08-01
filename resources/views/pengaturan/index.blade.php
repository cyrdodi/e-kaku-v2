<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Pengaturan') }}
    </h2>
  </x-slot>

  <div class="py-10">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="w-full mt-6 bg-white max-w-7xl card">
        <div class="card-body">
          <ul class="menu  w-[618px] rounded-box">
            <li>
              <h2 class="menu-title">Cetak Kartu</h2>
              <ul>
                <li><a href="{{ route('pengaturan.pejabat') }}">Pejabat Penandatangan</a></li>
              </ul>
            </li>
          </ul>
        </div>

      </div>
    </div>


  </div>
  </div>
</x-app-layout>