@props(['label', 'name', 'altLabel' => null, 'placeholder' => ''])
<div class="form-control">
  <label class="label">
    <span class="label-text">{{ $label }}</span>
  </label>
  <textarea class="h-24 textarea textarea-bordered" name="{{ $name }}"
    placeholder="{{ $placeholder }}">{{ $slot }}</textarea>
  @if($altLabel)
  <label class="label">
    <span class="label-text-alt">{{ $altLabel }}</span>
  </label>
  @endif
</div>