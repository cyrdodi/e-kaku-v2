@props(['name', 'label', 'altLabel' => null, 'placeholder' => ''])
<div class="w-full mb-4 form-control">
  <label class="label">
    <span class="label-text">{{ $label }}</span>
  </label>
  <input @error($name) {{ $attributes->merge(['class' => 'w-full input input-bordered input-error']) }}
  @else
  {{ $attributes->merge(['class' => 'w-full input input-bordered ']) }}
  @enderror
  name="{{ $name }}"
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