<div class="p-4">
  <form wire:submit.prevent="submit">
    <x-form.select label="Pejabat Penandatangan" name="functionary_id" wire:model="functionary_id">
      <option value="">--Pilih--</option>
      @foreach($functionaries as $functionary)
      <option value="{{ $functionary->id }}">{{ $functionary->name }}</option>
      @endforeach
    </x-form.select>

    <x-form.input type="date" name="expired" label="Expired Date" wire:model="expired" />
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>