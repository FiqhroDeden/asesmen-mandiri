<div>
    <input type="checkbox"  class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form wire:submit="simpan" class="modal-box w-11/12 max-w-7xl">
            <button  wire:click.prevent="closeModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            <h3 class="font-bold text-lg">Penilaian Perolehan SKS</h3>
            <div class="flex justify-between">
                <div class="px-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">{{ $nama_matakuliah }}</h3>
                </div>
            </div>
            <p class="mt-1 max-w-full text-sm leading-6 text-gray-500">{{ $uraian_matakuliah }}</p>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kemampuan Akhir Yang Diharapkan/ Capaian Pembelajaran Mata Kuliah</th>
                            <th>Profiesiensi pengetahuan dan  <br>keterampilan saat ini*</th>
                            <th>Bukti yang disampaikan*</th>
                            <th>Evaluasi Asesor*</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($dataPerolehanSks->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">Data Perolehan SKS tidak ditemukan.</td>
                        </tr>
                        @else
                            @foreach ($dataPerolehanSks as $perolehanSks)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $perolehanSks->cpm->capaian }} </td>
                                    <td>
                                        <div class="form-control">
                                            <label class="label cursor-pointer">
                                              <span class="label-text">Sangat Baik</span>
                                              <input type="radio" value="SB" name="status-{{ $perolehanSks->id }}" wire:model="form.{{ $perolehanSks->id }}.status_ketrampilan" name="radio-10" class="radio checked:bg-green-500"  />
                                            </label>
                                          </div>
                                          <div class="form-control">
                                            <label class="label cursor-pointer">
                                              <span class="label-text">Baik</span>
                                              <input type="radio" wire:model="form.{{ $perolehanSks->id }}.status_ketrampilan" value="B" name="status-{{ $perolehanSks->id }}" name="radio-10" class="radio checked:bg-blue-500"  />
                                            </label>
                                          </div>
                                          <div class="form-control">
                                            <label class="label cursor-pointer">
                                              <span class="label-text">Tidak Pernah</span>
                                              <input type="radio" value="TP" name="status-{{ $perolehanSks->id }}" wire:model="form.{{ $perolehanSks->id }}.status_ketrampilan" name="radio-10" class="radio checked:bg-red-500"  />
                                            </label>
                                          </div>
                                    </td>
                                    <td>

                                        <ul >
                                        @foreach ($form[$perolehanSks->id]['bukti_pendukung'] as $bukti)
                                            <li class="border-b-2">
                                                    <span>{{ $bukti->buktiPendukung->nama }}</span>
                                                    <a href="{{ Storage::url($bukti->buktiPendukung->path) }}" class="text-medium text-blue-400" target="_blank">Lihat</a>
                                            </li>

                                            @endforeach
                                        </ul>

                                    </td>
                                    <td>
                                        <div class="form-control">
                                            <label class="label cursor-pointer">
                                              <span class="label-text">Valid/Sahih</span>
                                              <input type="checkbox" wire:model="form.{{ $perolehanSks->id }}.is_valid"  class="checkbox"  />
                                            </label>
                                            <label class="label cursor-pointer">
                                              <span class="label-text">Autentik/Asli</span>
                                              <input type="checkbox" wire:model="form.{{ $perolehanSks->id }}.is_autentik"  class="checkbox"  />
                                            </label>
                                            <label class="label cursor-pointer">
                                              <span class="label-text">Terkini</span>
                                              <input type="checkbox" wire:model="form.{{ $perolehanSks->id }}.is_terkini"  class="checkbox"  />
                                            </label>
                                            <label class="label cursor-pointer">
                                              <span class="label-text">Memadai/Cukup</span>
                                              <input type="checkbox" wire:model="form.{{ $perolehanSks->id }}.is_memadai"  class="checkbox"  />
                                            </label>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
            <div class="modal-action flex justify-between">
                <button type="button" wire:click="closeModal" class="btn " >Tutup</button>
                @if(!$is_permanen)
                    @if(!$dataPerolehanSks->isEmpty())
                    <button type="submit"  class="btn btn-primary">
                        <x-tabler-check class="size-5" />
                        <span>Simpan</span>
                    </button>
                    @endif
                @endif
            </div>
        </form>
    </div>
</div>
