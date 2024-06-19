<div>
    <input type="checkbox"  class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
    <form class="modal-box" wire:submit="simpan">
        <h3 class="font-bold text-lg">Transfer SKS</h3>
        <div class="py-4 space-y-2">
            <label class="form-control w-full ">
                <div class="label">
                  <span class="label-text">Mata Kuliah Konversi</span>
                </div>
                <input type="text"@class(['input input-bordered', 'input-error' => $errors->first('nama_matakuliah')]) wire:model="nama_matakuliah" @readonly(true) />
                @error('form.nama')
                    <span class="error">{{ $message }}</span>
                @enderror
            </label>
            <label class="form-control w-full ">
                <div class="label">
                  <span class="label-text">Mata Kuliah Asal</span>
                </div>
                <input type="text" placeholder="Input Nama Matakuliah Asal" @class(['input input-bordered', 'input-error' => $errors->first('form.nama_matakuliah_asal')]) wire:model="form.nama_matakuliah_asal" required/>
                @error('form.nama_matakuliah_asal')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <label class="form-control w-full ">
                <div class="label">
                  <span class="label-text">SKS Mata Kuliah Asal</span>
                </div>
                <input type="text" placeholder="Input SKS Matakuliah Asal" @class(['input input-bordered', 'input-error' => $errors->first('form.sks_matakuliah_asal')]) wire:model="form.sks_matakuliah_asal" required/>
                @error('form.sks_matakuliah_asal')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <label class="form-control w-full ">
                <div class="label">
                  <span class="label-text">Nilai Mata Kuliah Asal</span>
                </div>
                <input type="text" placeholder="Input Nilai Matakuliah Asal" @class(['input input-bordered', 'input-error' => $errors->first('form.nilai_matakuliah_asal')]) wire:model="form.nilai_matakuliah_asal" required/>
                @error('form.nilai_matakuliah_asal')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <label class="form-control w-42">
                <div class="label">
                    <span class="label-text">Bukti Pendukung</span>
                </div>
                <input type="hidden" wire:model="form.matakuliah_id">
                <select class="select select-bordered w-full" placeholder="Masukkan Capaian Pembelajaran" @class(['select select-bordered', 'select-error' => $errors->first('form.bukti_pendukung')]) wire:model="form.bukti_pendukung" multiple required>
                    @foreach($dataBuktiPendukung as $bukti)
                        <option value="{{ $bukti->id }}">{{ $bukti->nama }}</option>
                    @endforeach
                </select>
                @error('form.bukti_pendukung')
                <span class="error text-red-500">{{ $message }}</span>
            @enderror
            </label>
        </div>
        <div class="modal-action flex justify-between">
            <button type="button" wire:click="closeModal" class="btn " >Batal</button>
            <button type="submit"  class="btn btn-primary">
                <x-tabler-check class="size-5" />
                <span>Simpan</span>
            </button>
        </div>
    </form>
    </div>
</div>
