<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit.prevent="simpan" enctype="multipart/form-data">
            <h3 class="font-bold text-lg">Tambah Data : {{ $form_name }}</h3>
            <div class="py-4 space-y-2">
                @foreach ($fields as $field)
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">{{ $field->name }}</span>
                        </div>
                        <input type="text"
                               @class(['input input-bordered', 'input-error' => $errors->first('form.' . $field->slug)])
                               wire:model="form.{{ $field->slug }}"
                               required />
                        @error('form.' . $field->name)
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </label>
                @endforeach
            </div>
            <div class="modal-action flex justify-between">
                <button type="button" wire:click="closeModal" class="btn">Close</button>
                <button type="submit" class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
