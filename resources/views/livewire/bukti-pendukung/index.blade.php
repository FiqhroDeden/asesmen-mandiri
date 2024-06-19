<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Bukti Pendukung</h2>
            </div>

            <div class="flex justify-between">
                <div></div>
                <button wire:click="$dispatch('createBukti')" class="btn btn-button">
                    <x-tabler-plus class="size-5"/>
                    <span>Tambah Bukti Pendukung</span>
                </button>

            </div>
            <div class="overflow-x-auto">
                <table class="table">
                <!-- head -->
                <thead>
                    <tr >
                    <th class="w-2">No</th>
                    <th>Nama File</th>
                    <th>File</th>
                    <th>Keterangan</th>
                    <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @if ($dataBukti->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Bukti Pendukung belum ada</td>
                        </tr>
                    @else
                        @foreach ($dataBukti as $bukti)
                            <tr class="hover:bg-slate-100">
                                <th>{{ $no++ }}</th>
                                <td>{{ $bukti->nama }}</td>
                                <td>
                                    <a href="{{ Storage::url($bukti->path) }}" class="text-blue-400" target="_blank">Lihat File</a>
                                </td>
                                <td>{{ $bukti->uraian }}</td>
                                <td>
                                    <button
                                    wire:click="dispatch('deleteBukti', {bukti:{{ $bukti->id }}})"
                                    wire:confirm="Anda Yakin ingin menghapus Bukti ini ini?"
                                    class="btn btn-xs btn-square"><x-tabler-trash class="text-red-500 size-4"/></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
                </table>
            </div>
        </div>
      </div>
      @livewire('bukti-pendukung.actions')

</div>
