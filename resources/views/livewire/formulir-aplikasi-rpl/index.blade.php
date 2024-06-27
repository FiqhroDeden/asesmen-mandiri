<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Daftar Matakuliah</h2>
            </div>
            <div class="overflow-x-auto">
                <form wire:submit.prevent="simpan" wire:confirm="Anda Yakin Menyimpan Perubahan Ini?" >
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th class="w-2">No</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Jenis</th>
                                <th>Mengajukan RPL</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataMatakuliah as $index => $matakuliah)
                                <tr class="hover:bg-slate-100" x-data="{ status: '' }" wire:key="{{ $matakuliah->id }}">
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $matakuliah->kode }}</td>
                                    <td>
                                        <div class="flex items-center">
                                            <span>{{ $matakuliah->nama }}</span>
                                            <button @click.prevent="$dispatch('showDetail', {matakuliah:{{ $matakuliah->id }}})">
                                                <x-tabler-zoom-exclamation class="text-blue-400 ml-2 size-4" />
                                            </button>
                                        </div>
                                    </td>
                                    <td>{{ $matakuliah->sks }}</td>
                                    <td>{{ $matakuliah->semester }}</td>
                                    <td>{{ $matakuliah->is_wajib ? 'Wajib' : 'Pilihan' }}</td>
                                    <td>
                                        @if($matakuliah->is_rpl)
                                            <div class="form-control space-y-2">
                                                <div class="flex flex-row space-x-2">
                                                    <label class="label cursor-pointer flex items-center space-x-2">
                                                        <input type="radio" name="status-{{ $matakuliah->id }}" wire:model="form.{{ $matakuliah->id }}.status" value="ya"  class="radio checked:bg-green-500"  required />
                                                        <span class="label-text">Ya</span>
                                                    </label>
                                                    <label class="label cursor-pointer flex items-center space-x-2">
                                                        <input  type="radio" name="status-{{ $matakuliah->id }}" wire:model="form.{{ $matakuliah->id }}.status" value="tidak" class="radio checked:bg-red-500"  required />
                                                        <span class="label-text">Tidak</span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($matakuliah->is_rpl)
                                            <div>
                                                <select class="select select-bordered select-sm w-full max-w-xs" wire:model="form.{{ $matakuliah->id }}.keterangan" :required="status === 'ya'" x-ref="select">
                                                    <option value="">-- Pilih --</option>
                                                    @if(Auth::user()->peserta->prodi->is_transfersks)
                                                    <option value="transfer-sks">Transfer SKS</option>
                                                    @endif
                                                    @if(Auth::user()->peserta->prodi->is_perolehansks)
                                                    <option value="perolehan-sks">Perolehan SKS</option>
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="max-w-30">
                                                @error('form.' . $matakuliah->id . '.keterangan')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Mata Kuliah Untuk Di Ajukan tidak ada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if(!$dataMatakuliah->isEmpty())
                        <div class="flex mt-4">
                            <button type="submit" class="btn btn-primary">
                                <x-tabler-device-floppy class="size-4"/>
                                <span class="text-bold">Simpan</span>
                                <div wire:loading wire:target="simpan">
                                    <span class="loading loading-spinner loading-xs"></span>
                                </div>
                            </button>
                        </div>
                    @endif
                </form>

                @if(!Auth::user()->peserta->formulirAplikasiRpl->isEmpty())
                    <div>
                        <!-- Alert for Download Form 2 -->
                        <div role="alert" class="alert my-5" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span> Download File Form 2 anda <a href="{{ route('download.form-2') }}" class="text-blue-800 underline" target="_blank">Disini</a> agar dapat di tanda tangani dan menguploadnya kembali pada form dibawah.</span>
                        </div>
                        @if(!$isUploaded)
                        <form wire:submit.prevent="uploadFile">
                            <div class="join">
                                <input type="file" wire:model.live="file" accept="application/pdf" class="file-input file-input-bordered w-full max-w-xs" required />

                                <button type="submit" class="btn btn-success" wire:loading.attr="disabled">
                                    <span>Upload</span>
                                    <div wire:loading wire:target="uploadFile">
                                        <span class="loading loading-spinner loading-xs"></span>
                                    </div>
                                </button>
                            </div>
                            @error('file')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="file">Uploading...</div>
                        </form>

                        @else
                        <div role="alert" class="alert alert-success my-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span> Form 2 Telah Diupload di upload, lihat file yang anda upload  <a href="{{ Storage::url(Auth::user()->peserta->file_form2) }}" class="text-blue-800 underline" target="_blank">disini</a> </span>
                            <button class="btn btn-sm btn-warning" wire:click="uploadUlang">Upload Ulang</button>
                        </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
   @livewire('formulir-aplikasi-rpl.detail')
</div>
