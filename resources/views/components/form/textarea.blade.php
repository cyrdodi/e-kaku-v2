@props(['label', 'name', 'altLabel' => null, 'placeholder' => ''])
<div class="mb-4 form-control">
  <label class="label">
    <span class="label-text">{{ $label }}</span>
  </label>
  <textarea class="h-24 textarea textarea-bordered @error($name) textarea-error @enderror" name="{{ $name }}"
    placeholder="{{ $placeholder }}" {{ $attributes }}>{{ $slot }}</textarea>
  @if($altLabel)
  <label class="label">
    <span class="label-text-alt">{{ $altLabel }}</span>
  </label>
  @endif
  @error($name)
  <small class="mt-2 text-red-500">{{ $message }}</small>
  @enderror
</div>