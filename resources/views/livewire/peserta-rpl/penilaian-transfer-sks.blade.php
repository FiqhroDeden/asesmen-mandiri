<div>
    <input type="checkbox"  class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box w-11/12 max-w-5xl">
            <button  wire:click="closeModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            <h3 class="font-bold text-lg">Penilaian Transfer SKS</h3>

           <div>

                <div class="mt-6 border-t border-gray-100">
                  <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                      <dt class="text-sm font-medium leading-6 text-gray-900">Mata Kuliah Konversi</dt>
                      <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $matakuliah_konversi }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                      <dt class="text-sm font-medium leading-6 text-gray-900">Nama Mata Kuliah Asal</dt>
                      <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $nama_matakuliah_asal }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                      <dt class="text-sm font-medium leading-6 text-gray-900">SKS Mata Kuliah Asal</dt>
                      <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $sks_matakuliah_asal }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                      <dt class="text-sm font-medium leading-6 text-gray-900">Nilai Mata Kuliah Asal</dt>
                      <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $nilai_matakuliah_asal }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                      <dt class="text-sm font-medium leading-6 text-gray-900">Bukti Yang Disampaikan</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                               @foreach($bukti_pendukung as $bukti)
                               <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                    <div class="flex w-0 flex-1 items-center">
                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                        <span class="truncate font-medium">{{ $bukti->buktiPendukung->nama }}</span>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ Storage::url($bukti->buktiPendukung->path) }}" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                    </div>
                                </li>
                               @endforeach
                            </ul>
                        </dd>
                    </div>
                    @if(!$is_permanen)
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Beri Nilai</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <div x-data="{ nilai: @entangle('nilai') }">
                                <form wire:submit.prevent="simpan">
                                    <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                        <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                            <div class="flex w-0 flex-1 items-center">
                                                <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                    <input type="text" x-model="nilai" wire:model="nilai" placeholder="Masukan Nilai" class="input input-bordered input-sm w-56 max-w-xs" required />
                                                </div>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <button type="submit" class="font-bold btn btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </li>
                                        <template x-if="nilai === '-'">
                                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                                <div class="flex w-0 flex-1 items-center">
                                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                        <textarea placeholder="Masukan Alasan" wire:model="keterangan" class="textarea textarea-bordered textarea-sm w-full max-w-xs" required></textarea>
                                                    </div>
                                                </div>
                                            </li>
                                        </template>
                                    </ul>
                                </form>
                            </div>
                        </dd>
                    </div>
                    @endif
                  </dl>
                </div>
            </div>
        </div>
    </div>
</div>
