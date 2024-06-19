<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Asesmen Pengajuan Aplikasi RPL</h2>
                <div>
                    @if(!$is_permanen)
                    <button class="btn btn-warning" wire:click="permanen" wire:confirm.prompt="Apa anda yakin ingin menyelesaikan proses asesmen peserta ini ? \n\n Ketik PERMANEN untuk melanjutkan.|PERMANEN">
                        <x-tabler-lock class="size-5" />
                        <span>Permanen</span>
                    </button>
                    @endif
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                <!-- head -->
                    <thead>
                        <tr>
                            <th class="w-2">No</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Jenis RPL</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataEvaluasi as $evaluasi)
                            <tr class="hover:bg-slate-100">
                                <th>{{ $no++ }}</th>
                                <td>{{ $evaluasi->matakuliah->kode }}</td>
                                <td>
                                    {{ $evaluasi->matakuliah->nama }}
                                </td>
                                <td>{{ $evaluasi->matakuliah->sks }}</td>

                                <td>{{ $evaluasi->keterangan == 'transfer-sks' ? 'Transfer SKS' : 'Perolehan SKS' }}</td>

                                <td>
                                    @if ($evaluasi->keterangan == 'transfer-sks')
                                        @if ($evaluasi->transferSks->nilaiTransferSks)
                                            {{ $evaluasi->transferSks->nilaiTransferSks->nilai }}
                                        @endif
                                    @else
                                        @if ($evaluasi->nilaiPerolehanSks)
                                            {{ $evaluasi->nilaiPerolehanSks->nilai }} ({{ $evaluasi->nilaiPerolehanSks->skor }})
                                        @endif
                                    @endif
                                </td>
                                <td >

                                    @if ($evaluasi->keterangan == 'transfer-sks')

                                        <div class="flex">
                                        <button wire:click="$dispatch('nilaiTransferSks', {evaluasi: {{ $evaluasi->id }}})" class="btn btn-info btn-sm mr-2"><x-tabler-file-star class="size-5 text-" /> Penilaian</button>
                                        </div>
                                    @else
                                    <div class="flex">
                                        <button wire:click="$dispatch('nilaiPerolehanrSks', {evaluasi: {{ $evaluasi->id }}})" class="btn btn-info btn-sm mr-2"><x-tabler-file-star class="size-5 text-" /> Penilaian</button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($is_permanen)
            <div>
                <!-- Alert for Download Form 2 -->
                <div role="alert" class="alert my-5" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span> Download Berita Acara Asesmen.<a href="{{ route('download.berita-acara', $no_peserta) }}" class="text-blue-800 underline" target="_blank">Disini</a> agar dapat di tanda tangani dan menguploadnya kembali pada form dibawah untuk menyelesaikan proses asesmen peserta ini.</span>
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
                        <span> Berita Acara Hasil Asesmen berhasil di upload</span>
                        {{-- <button class="btn btn-sm btn-warning" wire:click="uploadUlang">Upload Ulang</button> --}}
                    </div>
                @endif

            </div>
        @endif
        </div>
      </div>
      @livewire('peserta-rpl.penilaian-transfer-sks')
      @livewire('peserta-rpl.penilaian-perolehan-sks')
</div>
