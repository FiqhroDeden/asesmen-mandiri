<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Asesmen Pengajuan Aplikasi RPL</h2>
                <div>
                    @if(!$is_permanen && $can_permanen)
                    <button class="btn btn-warning" wire:click="permanen" wire:confirm.prompt="Apa anda yakin ingin menyelesaikan proses asesmen peserta ini ? \n\n Ketik PERMANEN untuk melanjutkan.|PERMANEN">
                        <x-tabler-lock class="size-5" />
                        <span>Permanen</span>
                    </button>
                    @endif
                </div>
            </div>
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                  <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Foto</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                      @if ($peserta->foto)
                      <img src="https://mandiri.pmb.unpatti.ac.id/storage/{{ $peserta->foto }}" width="200px" alt="Foto Peserta">
                      @else
                          <p>Tidak ada Foto</p>
                      @endif
                    </dd>
                  </div>
                  <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Nomor Peserta</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $peserta->no_peserta }}</dd>
                  </div>
                  <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Nama</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $peserta->nama }}</dd>
                  </div>
                </dl>
            </div>
            <h5>Data Asesmen</h5>
            <div class="overflow-x-auto">
                <table class="table">
                <!-- head -->
                    <thead>
                        <tr>
                            <th class="w-2">No</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Mata Kuliah</th>
                            <th>Kurikulum</th>
                            <th>SKS</th>
                            <th>Jenis RPL</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataEvaluasi as $evaluasi)
                            <tr class="hover:bg-slate-100" wire:key="{{ $evaluasi->id }}">
                                <th>{{ $no++ }}</th>
                                <td>{{ $evaluasi->matakuliah->kode }}</td>
                                <td>
                                    {{ $evaluasi->matakuliah->nama }}
                                </td>
                                <td>
                                    {{ $evaluasi->matakuliah->tahun_berlaku }}
                                </td>
                                <td>{{ $evaluasi->matakuliah->sks }}</td>

                                <td>{{ $evaluasi->keterangan == 'transfer-sks' ? 'Transfer SKS' : 'Perolehan SKS' }}</td>

                                <td>
                                    @if ($evaluasi->keterangan == 'transfer-sks')
                                        @if($evaluasi->transferSks)
                                            @if ($evaluasi->transferSks->nilaiTransferSks)
                                                {{ $evaluasi->transferSks->nilaiTransferSks->nilai }}
                                            @endif
                                        @endif
                                    @else
                                        @if ($evaluasi->nilaiPerolehanSks)
                                            {{ $evaluasi->nilaiPerolehanSks->nilai }} ({{ $evaluasi->nilaiPerolehanSks->skor }})
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if ($evaluasi->keterangan == 'transfer-sks')
                                        @if($evaluasi->transferSks)
                                            @if ($evaluasi->transferSks->nilaiTransferSks)
                                                @if($evaluasi->transferSks->nilaiTransferSks->is_lulus)
                                                    <div class="badge badge-success gap-2">
                                                        Cukup
                                                    </div>
                                                @else
                                                    <div class="badge badge-error gap-2">
                                                        Tidak Cukup
                                                    </div>
                                                @endif
                                            @endif
                                        @endif
                                    @else
                                        @if ($evaluasi->nilaiPerolehanSks)
                                            @if($evaluasi->nilaiPerolehanSks->is_lulus)
                                                <div class="badge badge-success gap-2">
                                                    Cukup
                                                </div>
                                            @else
                                                <div class="badge badge-error gap-2">
                                                    Tidak Cukup
                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                <td >

                                    @if ($evaluasi->keterangan == 'transfer-sks')
                                        @if($evaluasi->transferSks)
                                        <div class="flex">
                                            <button wire:click="$dispatch('nilaiTransferSks', {evaluasi: {{ $evaluasi->id }}})" class="btn btn-info btn-sm mr-2"><x-tabler-file-star class="size-5 text-" /> Penilaian</button>
                                        </div>
                                        @else
                                        Belum Mengisi Data Transfer
                                        @endif
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
                            <button type="submit" class="btn btn-success" wire:loading.attr="disabled">
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
