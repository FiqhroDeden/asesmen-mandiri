<div class="main-wrapper" x-data="{ kurikulum : @entangle('kurikulum') }">
    <div class="card w-auto bg-base-100 shadow-xl">

        <form wire:submit="submit">
            <div class="card-body">
                <div class="card-title flex items-center justify-between">
                    <h2 class="mr-4">Asesmen Prestasi </h2>
                    @if(!$is_permanen)
                        <div class="flex items-center">
                            <a type="button" class="btn btn-warning mr-2"
                            wire:click="permanen"
                            wire:confirm="Apa anda yakin ingin mengakhiri Proses Asesmen Prestasi Peserta ini?"
                            >
                            <x-tabler-lock class="size-5" />
                            <span>Permanen</span>
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <x-tabler-device-floppy class="size-4"/>
                                <span class="text-bold">Simpan</span>
                                <div wire:loading wire:target="submit">
                                    <span class="loading loading-spinner loading-xs"></span>
                                </div>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="mt-6 border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Foto</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                          @if ($peserta->foto)
                          <img src="https://mandiri.pmb.unpatti.ac.id/storage/{{ $peserta->foto }}" width="200px" alt="Foto Peserta">
                          @else
                              <p>Tidak ada Foto</p>
                          @endif
                        </dd>
                      </div>
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nomor Peserta</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $peserta->no_peserta }}</dd>
                      </div>
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Prodi Pilihan</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $peserta->prodi['nama_prodi'] }}</dd>
                      </div>
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">NIK</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $peserta->nik }}</dd>
                      </div>
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nama</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $peserta->nama }}</dd>
                      </div>
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">File Peserta Prestasi</dt>
                        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                          <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                              <div class="flex w-0 flex-1 items-center">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                                </svg>
                                <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                  <span class="truncate font-medium">Rapor</span>
                                </div>
                              </div>
                              @if ($peserta->asesmenPrestasi && $peserta->asesmenPrestasi->file_path)
                                  <div class="ml-4 flex-shrink-0">
                                      <a href="{{ Storage::url($peserta->asesmenPrestasi->file_path) }}" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                  </div>
                              @else
                                  <div class="ml-4 flex-shrink-0">
                                      <p class="font-medium">Belum Diupload</p>
                                  </div>
                              @endif

                            </li>
                          </ul>
                        </dd>
                      </div>
                    </dl>
                  </div>
                <h5>Informasi Kurikulum</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Kurikulum</span>
                        </div>
                        <input type="text" class="input input-bordered input-sm" value="{{ $kurikulum == 'merdeka' ? 'Merdeka' : '2013' }}" readonly>
                    </label>
                    @if($kurikulum == '2013')
                        <label class="form-control w-full ">
                            <div class="label">
                                <span class="label-text"> Jurusan</span>
                            </div>
                            <input type="text" class="input input-bordered input-sm" value="{{ $jurusan}}" readonly>
                        </label>
                    @endif

                </div>
                <br>
                <h5>Semester 1</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Indonesia</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_1_bahasa_indonesia')]) wire:model="form.semester_1_bahasa_indonesia" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Inggris</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_1_bahasa_inggris')]) wire:model="form.semester_1_bahasa_inggris" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Matematika</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_1_matematika')]) wire:model="form.semester_1_matematika" />
                    </label>
                    <label class="form-control w-full ">

                        <div class="label">
                            <span class="label-text">IPA / Rata-rata nilai Fisika, Kimia, Biologi</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_1_ipa')]) wire:model="form.semester_1_ipa" />
                    </label>
                    <label class="form-control w-full ">

                        <div class="label">
                            <span class="label-text">IPS / Rata-rata nilai Ekonomi, Sosiologi, Geografi</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_1_ips')]) wire:model="form.semester_1_ips" />
                    </label>


                </div>
                <h5>Semester 2</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Indonesia</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_2_bahasa_indonesia')]) wire:model="form.semester_2_bahasa_indonesia" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Inggris</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_2_bahasa_inggris')]) wire:model="form.semester_2_bahasa_inggris" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Matematika</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_2_matematika')]) wire:model="form.semester_2_matematika" />
                    </label>
                    <label class="form-control w-full ">

                        <div class="label">
                            <span class="label-text">IPA / Rata-rata nilai Fisika, Kimia, Biologi</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_2_ipa')]) wire:model="form.semester_2_ipa" />
                    </label>
                    <label class="form-control w-full ">

                        <div class="label">
                            <span class="label-text">IPS / Rata-rata nilai Ekonomi, Sosiologi, Geografi</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_2_ips')]) wire:model="form.semester_2_ips" />
                    </label>
                </div>
                <br>
                <h5>Semester 3</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Indonesia</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_3_bahasa_indonesia')]) wire:model="form.semester_3_bahasa_indonesia" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Inggris</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_3_bahasa_inggris')]) wire:model="form.semester_3_bahasa_inggris" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Matematika </span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_3_matematika')]) wire:model="form.semester_3_matematika" />
                    </label>

                </div>
                @if($mapel_pendukung)
                    <p class="text-xs italic">Mata Pelajaran Pendukung</p>
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <label class="form-control w-full ">
                            <div class="label">
                                <span class="label-text">{{ $mapel_pendukung->nama }}</span>
                            </div>
                            <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_3_mapel_pendukung')]) wire:model="form.semester_3_mapel_pendukung" />
                        </label>
                    </div>
                @endif
                <br>
                <h5>Semester 4</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Indonesia</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_4_bahasa_indonesia')]) wire:model="form.semester_4_bahasa_indonesia" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Inggris</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_4_bahasa_inggris')]) wire:model="form.semester_4_bahasa_inggris" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Matematika </span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_4_matematika')]) wire:model="form.semester_4_matematika" />
                    </label>

                </div>
                @if($mapel_pendukung)
                    <p class="text-xs italic">Mata Pelajaran Pendukung</p>
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <label class="form-control w-full ">
                            <div class="label">
                                <span class="label-text">{{ $mapel_pendukung->nama }}</span>
                            </div>
                            <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_4_mapel_pendukung')]) wire:model="form.semester_4_mapel_pendukung" />
                        </label>
                    </div>
                @endif
                <br>
                <h5>Semester 5</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Indonesia</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_5_bahasa_indonesia')]) wire:model="form.semester_5_bahasa_indonesia" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Inggris</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_5_bahasa_inggris')]) wire:model="form.semester_5_bahasa_inggris" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Matematika </span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_5_matematika')]) wire:model="form.semester_5_matematika" />
                    </label>

                </div>
                @if($mapel_pendukung)
                    <p class="text-xs italic">Mata Pelajaran Pendukung</p>
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <label class="form-control w-full ">
                            <div class="label">
                                <span class="label-text">{{ $mapel_pendukung->nama }}</span>
                            </div>
                            <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_5_mapel_pendukung')]) wire:model="form.semester_5_mapel_pendukung" />
                        </label>
                    </div>
                @endif
                <br>
                <h5>Semester 6</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Indonesia</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_6_bahasa_indonesia')]) wire:model="form.semester_6_bahasa_indonesia" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Bahasa Inggris</span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_6_bahasa_inggris')]) wire:model="form.semester_6_bahasa_inggris" />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Matematika </span>
                        </div>
                        <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_6_matematika')]) wire:model="form.semester_6_matematika" />
                    </label>

                </div>
                @if($mapel_pendukung)
                    <p class="text-xs italic">Mata Pelajaran Pendukung</p>
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <label class="form-control w-full ">
                            <div class="label">
                                <span class="label-text">{{ $mapel_pendukung->nama }}</span>
                            </div>
                            <input type="number" placeholder="Masukan Nilai" @class(['input input-bordered input-sm', 'input-error' => $errors->first('form.semester_6_mapel_pendukung')]) wire:model="form.semester_6_mapel_pendukung" />
                        </label>
                    </div>
                @endif
            </div>
        </form>

      </div>
</div>
