@props(['name', 'label', 'altLabel' => null, 'placeholder' => ''])
<div class="w-full mb-4 form-control">
  <label class="label">
    <span class="label-text">{{ $label }}</span>
  </label>
  <input class="w-full input input-bordered @error($name) input-error @enderror" name="{{ $name }}"
    placeholder="{{ $placeholder }}" {{ $attributes }} value="{{ old($name) }}" />
  @if($altLabel)
  <label class="label">
    <span class="label-text-alt">{{ $altLabel }}</span>
  </label>
  @endif

  @error($name)
  <small class="mt-2 font-medium text-red-500">{{ $message }}</small>
  @enderror
</div>