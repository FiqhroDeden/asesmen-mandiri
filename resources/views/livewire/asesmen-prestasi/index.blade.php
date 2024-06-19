<div class="main-wrapper" x-data="{ kurikulum : '' }">
    <div class="card w-auto bg-base-100 shadow-xl">
        @if(Auth::user()->peserta->asesmenPrestasi)
        <div>
            <div role="alert" class="alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Data Nilai anda sedang di verifikasi....</span>
              </div>
        </div>
        @else
        <form wire:submit="submit">
            <div class="card-body">
                <div class="card-title flex items-center justify-between">
                    <h2 class="mr-4">Asesmen Mandiri</h2>
                    <button type="submit" class="btn btn-primary">
                        <x-tabler-device-floppy class="size-4"/>
                        <span class="text-bold">Simpan</span>
                        <div wire:loading>
                            <span class="loading loading-spinner loading-xs"></span>
                        </div>
                    </button>
                </div>
                <h5>Kurikulum</h5>
                <hr>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Pilih Kurikulum</span>
                        </div>
                        <select wire:model.live="kurikulum" x-model="kurikulum" @class(['select select-bordered select-sm', 'select-error' => $errors->first('kurikulum')])>
                            <option value="">--Pilih--</option>
                            <option value="merdeka">Kurikulum Merdeka</option>
                            <option value="2013">Kurikulum 2013</option>
                        </select>
                    </label>
                    <div x-show="kurikulum == 2013"  x-transition.duration.500ms >
                        <label class="form-control w-full ">
                            <div class="label">
                                <span class="label-text">Pilih Jurusan</span>
                            </div>
                            <select wire:model.live="jurusan" @class(['select select-bordered select-sm', 'select-error' => $errors->first('jurusan')])>
                                <option  value="">--Pilih--</option>
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                                <option value="BAHASA">Bahasa</option>
                                <option value="KEJURUAN">Kejuruan</option>
                            </select>
                        </label>
                    </div>
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
                <br>
                <h5>Upload Rapor</h5>
                <hr>
                <div class="">
                    <div class="join">
                        <input type="file" wire:model="form.file" accept="application/pdf" class="file-input file-input-bordered w-full max-w-xs" required />
                    </div>
                    <div wire:loading wire:target="form.file">Uploading...</div>
                </div>

            </div>
        </form>
        @endif

      </div>
</div>
