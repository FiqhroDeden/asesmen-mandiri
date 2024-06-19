<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Peserta RPL</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                <!-- head -->
                <thead>
                    <tr class="text-center">
                        <th class="w-2">No</th>
                        <th>No Peserta</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Prodi Pilihan</th>
                        <th width="150px" >Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($dataPeserta as $peserta)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $peserta->no_peserta }}</td>
                            <td>{{ $peserta->nama }}</td>
                            <td>{{ $peserta->jenis_kelamin }}</td>
                            <td>{{ $peserta->prodi->nama_prodi }}</td>
                            <td>
                                <div class="tooltip m-1" data-tip="Pengajuan RPL">
                                    <button wire:click="$dispatch('showFormulirRpl', {no_peserta: '{{ $peserta->no_peserta }}'})" class="btn btn-sm btn-square">
                                        <x-tabler-notebook class="size-5"/>
                                    </button>
                                </div>
                                <div class="tooltip m-1" data-tip="Detail Peserta">
                                    <a href="{{ route('peserta-rpl.detail', $peserta->no_peserta ) }}" class="btn btn-sm btn-square" wire:navigate>
                                        <x-tabler-info-circle class="text-blue-500 size-5"/>
                                    </a>
                                 </div>
                                @if ($peserta->claim_by == Auth::user()->id)
                                <div class="tooltip m-1" data-tip="Proses">
                                    <a href="{{ route('peserta-rpl.asesmen', $peserta->no_peserta ) }}" class="btn btn-sm btn-square" wire:navigate>
                                        <x-tabler-clipboard-check class="text-green-500 size-5"/>
                                    </a>
                                </div>
                                @elseif($peserta->claim_by == null)
                                <div class="tooltip m-1" data-tip="Klaim">
                                    <button
                                        x-data="{ loading: false }"
                                        x-on:click="if (confirm('Apa anda yakin ingin klaim peserta ini?')) { loading = true; $wire.$dispatch('klaim', {peserta: {{ $peserta->id }}}).then(() => { loading = false }) } else { loading = false; }"
                                        class="btn btn-sm btn-square"
                                    >
                                        <template x-if="!loading">
                                            <x-tabler-user-exclamation class="text-yellow-500 size-5"/>
                                        </template>
                                        <template x-if="loading">
                                            <span class="loading loading-dots loading-xs"></span>
                                        </template>
                                    </button>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                </table>
            </div>
        </div>
      </div>

      @livewire('peserta-rpl.formulir-aplikasi-rpl')
</div>
