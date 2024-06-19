<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Hasil Penilaian</h2>
            </div>
            {{-- <div class="overflow-x-auto">
                <table class="table text-center">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th class="w-2">No</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Skor Rata-rata</th>
                            <th>Nilai Huruf</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dummy Data -->
                        <tr>
                            <td>1</td>
                            <td>MK001</td>
                            <td>Matematika</td>
                            <td>85</td>
                            <td>A</td>
                            <td>Perolehan SKS</td>
                        </tr>

                    </tbody>
                </table>

            </div> --}}
            @if($is_permanen)
                <div>
                    <!-- Alert for Download Form 2 -->
                    <div role="alert" class="alert my-5" >
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span> Download File Form 3 anda <a href="{{ route('download.form-3') }}" class="text-blue-800 underline" target="_blank">Disini</a> agar dapat di tanda tangani dan menguploadnya kembali pada form dibawah.</span>
                    </div>
                    @if(!$isUploaded)
                    <form wire:submit.prevent="uploadFile" >
                        <div class="join">
                            <input type="file" wire:model="file" accept="application/pdf" class="file-input file-input-bordered w-full max-w-xs" required />
                            <button type="submit" class="btn btn-success">
                                <span>Upload</span>
                                <div wire:loading wire:target="uploadFile">
                                    <span class="loading loading-spinner loading-xs"></span>
                                </div>
                            </button>
                        </div>
                        <div wire:loading wire:target="file">Uploading...</div>
                    </form>
                    @else
                    <div role="alert" class="alert alert-success my-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span> Form 3 Telah Diupload di upload, lihat file yang anda upload  <a href="{{ Storage::url(Auth::user()->peserta->file_form3) }}" class="text-blue-800 underline" target="_blank">disini</a> dan Terima kasih telah menyelesaikan seluruh proses Asesmen Mandiri RPL. </span>
                        {{-- <button class="btn btn-sm btn-warning" wire:click="uploadUlang">Upload Ulang</button> --}}
                    </div>
                    @endif
                </div>
            @endif
        </div>
      </div>


</div>
