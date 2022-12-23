@props(['label', 'name', 'altLabel' => null])
<div class="w-full mb-4 form-control">
  <label class="label">
    <span class="label-text">{{ $label }}</span>
  </label>
  <select class="select select-bordered @error($name) select-error @enderror" name="{{ $name }}" {{ $attributes }}>
    {{ $slot }}
  </select>
  @if($altLabel)
  <label class="label">
    <span class="label-text-alt">{{ $altLabel }}</span>
  </label>
  @endif
  @error($name)
  <small class="mt-4 text-red-500">{{ $message }}</small>
  @enderror
</div>