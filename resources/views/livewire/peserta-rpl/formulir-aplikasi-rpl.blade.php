<div>
    <input type="checkbox"  class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
    <div class="modal-box w-11/12 max-w-5xl">
        <button  wire:click="closeModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        <h3 class="font-bold text-lg">Formulir Aplikasi RPL : {{ $nama_peserta }}</h3>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th class="w-2">No</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Matakuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($dataFormulirRpl->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Peserta Ini Belum Mengajukan RPL</td>
                    </tr>
                    @else
                        @foreach ($dataFormulirRpl as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->matakuliah->kode }}</td>
                            <td>{{ $data->matakuliah->nama }}</td>
                            <td>{{ $data->matakuliah->sks }}</td>
                            <td>{{ $data->matakuliah->semester }}</td>
                            <td>{{ $data->keterangan }}</td>
                        </tr>
                        @endforeach
                    @endif


                </tbody>
            </table>

        </div>
    </div>
    </div>
</div>
