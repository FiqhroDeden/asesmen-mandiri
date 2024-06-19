<div>
    <input type="checkbox" id="modal-toggle" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box w-11/12 max-w-5xl">
            <button wire:click="closeModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            <h3 class="font-bold text-lg">{{ $nama_matakuliah }}</h3>
            <p>{{ $uraian }}</p>
            <hr>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kemampuan Akhir Yang Diharapkan/Capaian Pembelajaran Mata Kuliah</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if ($dataCpmk->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center">Data not found</td>
                            </tr>
                        @else
                            @foreach ($dataCpmk as $index => $cpm)
                                <tr class="hover:bg-slate-100">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $cpm->capaian }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
