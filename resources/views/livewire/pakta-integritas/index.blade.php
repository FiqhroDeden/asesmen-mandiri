<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <form wire:submit="simpan">
            <div class="card-body">
                <div class="card-title flex items-center justify-between">
                    <h2 class="mr-4">Form Pakta Integritas</h2>
                    <div>
                        @if ($showDownload)
                            <a href="{{ route('download.pakta-integritas') }}" target="_blank" class="btn btn-success">
                                <x-tabler-file-download class="size-4"/>
                                <span class="text-bold">Download Pakta Integritas</span>
                                <div wire:loading>
                                    <span class="loading loading-spinner loading-xs"></span>
                                </div>
                            </a>
                        @endif
                        <button type="submit" class="btn btn-primary">
                            <x-tabler-device-floppy class="size-4"/>
                            <span class="text-bold">Simpan</span>
                            <div wire:loading>
                                <span class="loading loading-spinner loading-xs"></span>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Nama Lengkap</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.nama_lengkap')]) wire:model="form.nama_lengkap" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Jenis Kelamin</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.jenis_kelamin')]) wire:model="form.jenis_kelamin" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Jabatan Fungsional</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.jabatan_fungsional')]) wire:model="form.jabatan_fungsional" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">NIK</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.nik')]) wire:model="form.nik" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">NIP</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.nip')]) wire:model="form.nip" @required(true)/>
                    </label>

                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Tempat Lahir</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.tempat_lahir')]) wire:model="form.tempat_lahir" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Tanggal Lahir</span>
                        </div>
                        <input type="date" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.tanggal_lahir')]) wire:model="form.tanggal_lahir" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Email</span>
                        </div>
                        <input type="email" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.email')]) wire:model="form.email" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Nomor Hp</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.no_hp')]) wire:model="form.no_hp" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Alamat</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.alamat')]) wire:model="form.alamat" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Nomor Telepon/Fax</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.no_telp')]) wire:model="form.no_telp" @required(true)/>
                    </label>
                </div>
                <h5>Pendidikan</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Bidang Keilmuan</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.bidang_keilmuan')]) wire:model="form.bidang_keilmuan" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Pendidikan Terakhir</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.pendidikan_terakhir')]) wire:model="form.pendidikan_terakhir" @required(true)/>
                    </label>
                </div>
                <h5>Pekerjaan</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Nama Instansi</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.nama_instansi')]) wire:model="form.nama_instansi" @required(true)/>
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                        <span class="label-text">Jabatan</span>
                        </div>
                        <input type="text" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.jabatan')]) wire:model="form.jabatan" @required(true)/>
                    </label>
                </div>
            </div>
        </form>
        @if($paktaIntegritas )
            @if($paktaIntegritas->file == null)
            <hr>
            <form wire:submit="uploadFile" enctype="multipart/form-data">
                <div class="card-body">
                    <h3>Upload Pakta Integritas</h3>
                        <label class="form-control w-72">
                            <input type="file" accept="application/pdf" class="file-input file-input-bordered w-full max-w-xs" @class(['file-input-error' => $errors->first('form.file')]) wire:model="form.file" @required(true) />
                        </label>
                        @error('form.file')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div wire:loading wire:target="form.file">Uploading...</div>
                    <div class="flex w-40">
                        <button type="submit" class="btn btn-success"><x-tabler-upload class="size-5" />Upload</button>
                    </div>

                </div>
            </form>
            @endif
        @endif

      </div>
</div>
