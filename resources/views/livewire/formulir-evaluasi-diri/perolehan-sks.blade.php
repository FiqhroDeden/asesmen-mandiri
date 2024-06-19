<div>
    <input type="checkbox"  class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
    <form class="modal-box w-11/12 max-w-5xl" wire:submit="simpan">
        <h3 class="font-bold text-lg">Perolehan SKS</h3>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kemampuan Akhir Yang Diharapkan/ Capaian Pembelajaran Mata Kuliah</th>
                        <th>Profiesiensi pengetahuan dan  <br>keterampilan saat ini*</th>
                        <th>Bukti yang disampaikan*</th>
                    </tr>
                </thead>
                <tbody>
                    @if($dataCpmk->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">Data Capaian Pembelajaran Mata Kuliah ini belum ada, Silahkan menghubungi Admin.</td>
                        </tr>
                    @else
                    @foreach ($dataCpmk as $cpmk)
                        <tr x-data="{ status_ketrampilan: '' }">
                            <td>{{ $no++ }}</td>
                            <td>{{ $cpmk->capaian }}</td>
                            <td>
                                <select
                                    class="select select-bordered select-sm w-48 max-w-xs {{ $errors->has('form.' . $cpmk->id . '.status_ketrampilan') ? 'select-error' : '' }}"
                                    name="status_ketrampilan-{{ $cpmk->id }}"
                                    wire:model="form.{{ $cpmk->id }}.status_ketrampilan" required
                                >
                                    <option disabled value="">-- Pilih --</option>
                                    <option value="SB">Sangat baik</option>
                                    <option value="B">Baik</option>
                                    <option value="TP">Tidak pernah</option>
                                </select>
                            </td>
                            <td>
                                <select
                                    class="select select-bordered select-sm w-48 max-w-xs {{ $errors->has('form.' . $cpmk->id . '.bukti_pendukung') ? 'select-error' : '' }}"
                                    wire:model="form.{{ $cpmk->id }}.bukti_pendukung"
                                    x-bind:required="status_ketrampilan === 'SB' || status_ketrampilan === 'B'"
                                multiple >
                                    <option disabled selected value="">-- Pilih --</option>
                                    @foreach ($dataBukti as $bukti)
                                        <option value="{{ $bukti->id }}">{{ $bukti->nama }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="modal-action flex justify-between">
            <button type="button" wire:click="closeModal" class="btn " >Batal</button>
            @if(!$dataCpmk->isEmpty())
            <button type="submit"  class="btn btn-primary">
                <x-tabler-check class="size-5" />
                <span>Simpan</span>
            </button>
            @endif
        </div>
    </form>
    </div>
</div>
