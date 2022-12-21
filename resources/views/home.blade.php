<x-app-layout>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="relative overflow-hidden sm:rounded-lg">
        {{-- header --}}
        <div class="gap-6 md:flex my-14">
          <div>
            <h1 class="font-bold text-7xl">Aplikasi Pembuatan Kartu Pencari Kerja</h1>
            <div class="mt-2 text-xl text-gray-700">Dengan aplikasi pembuatan kartu pencari kerja online, Anda bisa
              membuat
              kartu pencari kerja dari mana saja, kapan
              saja, hanya dengan beberapa klik saja!</div>

            <div class="mt-4">
              <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
          </div>
          <div>
            <img src="{{ asset('images/logo-pandeglang.png') }}" alt="Logo Pandeglang" class="w-[400px]">
          </div>
        </div>
      </div>
    </div>

    {{-- maps --}}
    <div class="bg-white p-14 ">
      <div class="flex gap-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col items-end w-3/4 ">
          <h2 class="mb-4 text-5xl font-bold">Alamat</h2>
          <div>Sukamanah, Kaduhejo, Pandeglang Regency, Banten 42252, Indonesia</div>
          <div>0253 - 202038</div>
        </div>

        <div class=" mapouter">
          <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas"
              src="https://maps.google.com/maps?q=M38J+RX8,%20Sukamanah,%20Kec.%20Kaduhejo,%20Kabupaten%20Pandeglang,%20Banten%2042252&t=&z=13&ie=UTF8&iwloc=&output=embed"
              frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br>
            <style>
              .mapouter {
                position: relative;
                text-align: right;
                height: 500px;
                width: 100%;
              }
            </style>
            <style>
              .gmap_canvas {
                overflow: hidden;
                height: 500px;
                width: 100%;
              }
            </style>
          </div>
        </div>
      </div>
    </div>



  </div>
</x-app-layout>