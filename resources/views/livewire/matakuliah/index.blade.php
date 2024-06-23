<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Daftar Mata Kuliah</h2>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center gap-4 w-full">
                <label class="form-control w-full md:w-1/3">
                    <div class="label">
                        <span class="label-text">Pencarian</span>
                    </div>
                    <input type="text" wire:model.live="search" class="input input-bordered w-full" placeholder="Pencarian">
                </label>

                <div class="flex flex-col md:flex-row gap-4 w-full md:w-2/3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Keterangan</span>
                        </div>
                        <select class="select select-bordered w-full" wire:model.live="keterangan">
                            <option value="">-- Semua --</option>
                            <option value="1">Wajib</option>
                            <option value="0">Pilihan</option>
                        </select>
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Semester</span>
                        </div>
                        <select class="select select-bordered w-full" wire:model.live="semester">
                            <option value="">-- Semua --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </label>
                </div>
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
                                    {{ $matakuliah->is_wajib ? 'Wajib' : 'Pilihan' }}
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
