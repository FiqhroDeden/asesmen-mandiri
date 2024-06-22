<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Daftar Mata Kuliah</h2>
            </div>

            <div class="flex justify-between">
                <input type="text" wire:model.live="search" class="input input-bordered" placeholder="Pencarian">
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th class="w-2">No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kurikulum</th>
                        <th>Semester</th>
                        <th>SKS</th>
                        <th>Keterangan</th>
                        <th>RPL</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($dataMatakuliah->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center">Data not found</td>
                        </tr>
                    @else
                        @php
                            $no = ($dataMatakuliah->currentPage() - 1) * $dataMatakuliah->perPage() + 1;
                        @endphp
                        @foreach ($dataMatakuliah as $matakuliah)
                            <tr class="hover:bg-slate-100">
                                <th>{{ $no++ }}</th>
                                <td>{{ $matakuliah->kode }}</td>
                                <td>{{ $matakuliah->nama }}</td>
                                <td>{{ $matakuliah->tahun_berlaku }}</td>
                                <td>{{ $matakuliah->semester }}</td>
                                <td>{{ $matakuliah->sks }}</td>
                                <td>
                                    {{ $matakuliah->is_wajib ? 'Wajib' : 'Tidak Wajib' }}
                                </td>
                                <td>
                                    <input type="checkbox" wire:model.live="form.{{ $matakuliah->id }}.is_rpl" class="checkbox" />
                                </td>
                                <td>
                                    <div class="tooltip" data-tip="cpmk">
                                        <button wire:click="dispatch('cpmModal', {matakuliah:{{ $matakuliah->id }}})" class="btn btn-xs btn-square"><x-tabler-star class="text-yellow-500 size-4"/></button>
                                    </div>
                                    <button class="btn btn-xs btn-square" wire:click="dispatch('editMatakuliah', {matakuliah:{{ $matakuliah->id }}})">
                                        <x-tabler-align-box-left-middle class="size-4"/>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
                <div class="mt-5">
                    {{ $dataMatakuliah->links(data: ['scrollTo' => false]) }}
                </div>
            </div>
        </div>
    </div>
    @livewire('matakuliah.actions')
    @livewire('matakuliah.cpm')
</div>
