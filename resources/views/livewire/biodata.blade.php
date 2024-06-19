<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <form wire:submit="simpan">
            <div class="card-body">
                <div class="card-title flex items-center justify-between">
                    <h2 class="mr-4">Biodata</h2>
                    <button type="submit" class="btn btn-primary">
                        <x-tabler-device-floppy class="size-4"/>
                        <span class="text-bold">Simpan</span>
                        <div wire:loading>
                            <span class="loading loading-spinner loading-xs"></span>
                        </div>
                    </button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">No Peserta</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.no_peserta')]) wire:model="form.no_peserta" @readonly(true) />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Prodi Pilihan</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.prodi_pilihan')]) wire:model="form.prodi_pilihan" @readonly(true) />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">NIK</span>
                        </div>
                        <input type="text" placeholder="Masukan NIK" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.nik')]) wire:model="form.nik" />
                        @error('form.nik')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Nama</span>
                        </div>
                        <input type="text" placeholder="Masukan Nama" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.nama')]) wire:model="form.nama" />
                        @error('form.nama')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Tempat Lahir</span>
                        </div>
                        <input type="text" placeholder="Masukan Tempat Lahir" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.tempat_lahir')]) wire:model="form.tempat_lahir" />
                        @error('form.tempat_lahir')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Tanggal Lahir</span>
                        </div>
                        <input type="date"  @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.tanggal_lahir')]) wire:model="form.tanggal_lahir" />
                        @error('form.tanggal_lahir')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Jenis Kelamin</span>
                        </div>
                        <input type="text" placeholder="Input Jenis Kelamin" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.status_perkawinan')]) wire:model="form.jenis_kelamin" />
                        @error('form.jenis_kelamin')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Status Perkawinan</span>
                        </div>
                        <input type="text" placeholder="Masukan Status Perkawinan Anda" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.status_perkawinan')]) wire:model="form.status_perkawinan" />
                        @error('form.status_perkawinan')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Agama</span>
                        </div>
                        <input type="text" placeholder="Masukan Agama Anda"  @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.agama')]) wire:model="form.agama" />
                        @error('form.agama')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">No Hp</span>
                        </div>
                        <input type="text" placeholder="Masukan No Hp"  @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.no_hp')]) wire:model="form.no_hp" />
                        @error('form.no_hp')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Email</span>
                        </div>
                        <input type="text" placeholder="Masukan Email" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.email')]) wire:model="form.email" />
                        @error('form.email')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Alamat</span>
                        </div>
                        <input type="text" placeholder="Masukan Alamat" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.alamat')]) wire:model="form.alamat" />
                        @error('form.alamat')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Kode Pos</span>
                        </div>
                        <input type="text" placeholder="Masukan Kode Pos" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.kode_pos')]) wire:model="form.kode_pos" />
                        @error('form.kode_pos')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Kebangsaan</span>
                        </div>
                        <input type="text" placeholder="Masukan Kebangsaan" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.kebangsaan')]) wire:model="form.kebangsaan" />
                        @error('form.kebangsaan')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    @if(Auth::user()->peserta->jalur_pendaftaran == '53')
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Tempat Kerja</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.tempat_kerja')]) wire:model="form.tempat_kerja"  />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Pekerjaan</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.pekerjaan')]) wire:model="form.pekerjaan"  />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Jabatan</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.jabatan')]) wire:model="form.jabatan"  />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Status Pekerja</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.status_pekerja')]) wire:model="form.status_pekerja"  />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Alamat Tempat Kerja</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.alamat_tempat_kerja')]) wire:model="form.alamat_tempat_kerja"  />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Telp./Faks</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.telp_faks')]) wire:model="form.telp_faks"  />
                    </label>
                </div>
                <h5>Data Pendidikan</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Pendidikan Terakhir</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.pendidikan_terakhir')]) wire:model="form.pendidikan_terakhir"  />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Nama Pergurusan Tinggi</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.nama_pt')]) wire:model="form.nama_pt"  />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Program Studi</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.program_studi')]) wire:model="form.program_studi"  />
                    </label>
                    @endif
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Tahun Lulus</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.tahun_lulus')]) wire:model="form.tahun_lulus"  />
                    </label>
                </div>
            </div>
        </form>
      </div>
</div>
