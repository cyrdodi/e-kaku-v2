@props(['links' => [], 'current'])

{{-- {{ dd($links) }} --}}
<div class="text-sm breadcrumbs">
  <ul>
    @foreach($links as $link)
    <li><a href="{{ $link['url'] }}">{{ $link['name'] }}</a></li>
    @endforeach
    <li>{{ $current }}</li>
  </ul>
</div>