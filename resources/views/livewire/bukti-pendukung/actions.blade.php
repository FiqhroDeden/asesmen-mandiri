<div>
    <input type="checkbox"  class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
    <form class="modal-box" wire:submit="simpan" enctype="multipart/form">
        <h3 class="font-bold text-lg">Form Bukti Pendukung</h3>
        <div class="py-4 space-y-2">
            <label class="form-control w-full ">
                <div class="label">
                  <span class="label-text">Nama File</span>
                </div>
                <input type="text" placeholder="Masukan Nama File" @class(['input input-bordered', 'input-error' => $errors->first('form.nama')]) wire:model="form.nama" required />
                @error('form.nama')
                    <span class="error">{{ $message }}</span>
                @enderror
            </label>
            <label class="form-control w-full ">
                <div class="label">
                  <span class="label-text">Uraian File</span>
                </div>
                <input type="text" placeholder="Uraian File" @class(['input input-bordered', 'input-error' => $errors->first('form.uraian')]) wire:model="form.uraian" />
                @error('form.uraian')
                    <span class="error">{{ $message }}</span>
                @enderror
            </label>
            <label class="form-control w-full ">
                <div class="label">
                  <span class="label-text">Upload File</span>
                </div>
                <input type="file" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" placeholder="Uraian File" @class(['input', 'input-error' => $errors->has('form.file')]) wire:model="form.file" required />
                <div wire:loading wire:target="form.file">Uploading...</div>

                @error('form.file')
                    <span class="error">{{ $message }}</span>
                @enderror
            </label>
        </div>
        <div class="modal-action flex justify-between">
            <button type="button" wire:click="closeModal" class="btn " >Close</button>
            <button  class="btn btn-primary"  wire:loading.attr="disabled">
                <x-tabler-check class="size-5" />
                <span>Simpan</span>
            </button>
        </div>
    </form>
    </div>
</div>
