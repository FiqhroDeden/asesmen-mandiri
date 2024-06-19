<div x-data="{ showForm: false }" >
    <input type="checkbox" id="modal-toggle" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box w-11/12 max-w-5xl">
            <button @click="showForm = false" wire:click="closeModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            <h3 class="font-bold text-lg">Capaian Pembelajaran Matakuliah</h3>
            <p>{{ $namaMatakuliah }}</p>
            <hr>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kemampuan Akhir Yang Diharapkan/Capaian Pembelajaran Mata Kuliah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($dataCpm->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center">Data not found</td>
                            </tr>
                        @else
                            @foreach ($dataCpm as $index => $cpm)
                                <tr class="hover:bg-slate-100">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $cpm->capaian }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-square" wire:click="dispatch('deleteCpm', {cpm:{{ $cpm->id }}})">
                                            <x-tabler-trash  class="text-red-500 size-4" />
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div >
                    <form x-show="showForm" wire:submit="simpan"  @submit.prevent="showForm = false">
                        <label class="form-control w-42">
                            <input type="hidden" wire:model="form.matakuliah_id">
                            <input type="text" wire:model="form.capaian" class="input input-bordered w-full" placeholder="Masukkan Capaian Pembelajaran" @class(['input input-bordered', 'input-error' => $errors->first('form.capian')]) />

                        </label>
                        <div class="mt-2">
                            <button x-show="showForm" type="submit" class="btn btn-sm btn-button btn-square">
                                <x-tabler-device-floppy class="text-blue-500 size-4" />
                            </button>
                            <a x-show="showForm" @click="showForm = !showForm"  class="btn btn-sm btn-button btn-square">
                                <x-tabler-square-x class="text-red-500 size-4" />
                            </a>
                        </div>
                    </form>
                    <button x-show="!showForm" @click="showForm = !showForm" class="btn btn-sm btn-primary mt-4">
                        <x-tabler-plus class="size-4" />
                        <span>Tambah</span>
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
