<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Evaluasi Diri</h2>
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
                        <th>Semester</th>
                        <th>Jenis RPL</th>
                        <th>Pengisian Evaluasi Diri</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @if ($dataEvaluasi->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Anda Belum Mengajukan Formulir Aplikasi RPL</td>
                        </tr>
                    @else
                        @foreach ($dataEvaluasi as $evaluasi)
                            <tr class="hover:bg-slate-100" wire:key="{{ $evaluasi->id }}">
                                <th>{{ $no++ }}</th>
                                <td>{{ $evaluasi->matakuliah->kode }}</td>
                                <td>
                                    {{ $evaluasi->matakuliah->nama }}
                                </td>
                                <td>{{ $evaluasi->matakuliah->sks }}</td>
                                <td>{{ $evaluasi->matakuliah->semester }}</td>
                                <td>{{ $evaluasi->keterangan == 'transfer-sks' ? 'Transfer SKS' : 'Perolehan SKS' }}</td>
                                <td>

                                    @if ($evaluasi->keterangan == 'transfer-sks')
                                        <div class="flex items-center">
                                            <button wire:click="$dispatch('makeTransferSks', {evaluasi:{{ $evaluasi->id }}})" class="btn btn-sm btn-primary">Input Data Transfer</button>
                                            @if($evaluasi->transferSks)
                                            <div class="tooltip" data-tip="Reset Input">
                                                <button wire:click="$dispatch('resetInputTransferSks', {formulir_aplikasi: {{ $evaluasi->id }}})" wire:confirm="Apa anda Yakin Ingin Mengulang Input Transfer SKS?" class="btn btn-sm btn-square ml-2"> <x-tabler-restore class=" text-red-500 size-4" />
                                                </button>
                                            @endif
                                            </div>
                                        </div>

                                    @else
                                        <button wire:click="$dispatch('makePerolehanSks', {evaluasi:{{ $evaluasi->id }}})" class="btn btn-sm btn-primary">Pengisian Evaluasi Diri</button>
                                        @if(!$evaluasi->perolehanSks->isEmpty())
                                            <div class="tooltip" data-tip="Reset Input">
                                                <button wire:click="$dispatch('resetInputPerolehanSks', {formulir_aplikasi: {{ $evaluasi->id }}})" wire:confirm="Apa anda Yakin Ingin Mengulang Input Perolehan SKS?" class="btn btn-sm btn-square ml-2"> <x-tabler-restore class=" text-red-500 size-4" />
                                                </button>
                                            </div>
                                        @endif
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                    @endif

                </tbody>
                </table>
            </div>
        </div>
      </div>
      @livewire('formulir-evaluasi-diri.transfer-sks')
      @livewire('formulir-evaluasi-diri.perolehan-sks')
</div>
