<div class="main-wrapper">
    <div class="card w-auto bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="card-title flex items-center justify-between">
                <h2 class="mr-4">Formulir Daftar Riwayat Hidup (Curriculum Vitae)</h2>
            </div>
            <div class="join join-vertical w-full">
                @foreach ($riwayatHidupForms as $form)
                <div class="collapse collapse-arrow join-item border border-base-300">
                    <input type="radio" name="my-accordion-4" />
                    <div class="collapse-title text-xl font-medium">
                        {{ $form->name }}
                    </div>
                    <div class="collapse-content">
                        <div class="flex justify-between">
                            <div></div>
                            <button wire:click="$dispatch('createData', {form:{{ $form->id }}})" class="btn btn-button">
                                <x-tabler-plus class="size-5"/>
                                <span>Tambah</span>
                            </button>
                        </div>
                        @if($form->slug == 'pengalaman-kerja')
                        <div class="my-5">
                            <p>Pada bagian ini, diisi dengan pengalaman kerja yang anda miliki yang relevan dengan mata kuliah yang akan dinilai. Tulislah data pengalaman kerja saudara dimulai dari urutan paling akhir (terkini).</p>
                        </div>
                        @endif
                        <div class="overflow-x-auto">
                            <table class="table">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        @php
                                            $jumlah = 0;
                                        @endphp
                                        @foreach ($form->fields as $field)
                                            @php
                                                $jumlah++;
                                            @endphp
                                            <th>{{ $field->name }}</th>
                                        @endforeach
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $rowValues = [];
                                        $maxEntries = 0;
                                        $dataKey = [];

                                        // Collect all row data for each field and find the maximum number of entries
                                        foreach ($form->fields as $field) {
                                            $maxEntries = max($maxEntries, $field->riwayatHidup->count());
                                        }
                                    @endphp

                                    @if ($maxEntries === 0)
                                        <tr>
                                            <td colspan="{{ $jumlah }}" class="text-center">Belum ada data</td>
                                        </tr>
                                    @else
                                        @for ($i = 0; $i < $maxEntries; $i++)
                                            <tr>
                                                @foreach ($form->fields as $field)
                                                    @php
                                                        $value = $field->riwayatHidup[$i]->value ?? '';
                                                        $key = $field->riwayatHidup[$i]->key;
                                                    @endphp
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                                <td>
                                                    <button wire:click="$dispatch('deleteData', {dataKey: '{{ $key}}'})" wire:confirm="Apa anda Yakin Ingin Menghapus Data ini?" class="btn btn-xs btn-square"><x-tabler-trash class="text-red-500 size-4" /></button>
                                                </td>
                                            </tr>
                                        @endfor
                                    @endif
                                </tbody>



                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div role="alert" class="alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Silahkan Mengisi Daftar Riwayat Hidup anda kemudian mengunduh Form 7 anda <a href="{{ route('download.form-7') }}" target="_blank" class="underline text-blue-500">Disini.</a> Kemudian di tanda tangani dan di upload kembali pada form dibawah ini agar dapat dilihat asesor anda.</span>
            </div>
            @if(!$isUploaded)
            <form wire:submit.prevent="uploadFile" >
                <div class="join">
                    <input type="file" wire:model="file" accept="application/pdf" class="file-input file-input-bordered w-full max-w-xs" required />
                    <button type="submit" class="btn btn-success">
                        <span>Upload</span>
                        <div wire:loading wire:target="uploadFile">
                            <span class="loading loading-spinner loading-xs"></span>
                        </div>
                    </button>
                </div>
                <div wire:loading wire:target="file">Uploading...</div>
            </form>
            @else
            <div role="alert" class="alert alert-success my-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span> Form 7 Telah Diupload di upload, lihat file yang anda upload  <a href="{{ Storage::url(Auth::user()->peserta->file_form7 ) }}" class="text-blue-800 underline" target="_blank">disini</a> </span>
                <button class="btn btn-sm btn-warning" wire:click="uploadUlang">Upload Ulang</button>
            </div>
            @endif
        </div>
    </div>
    @livewire('formulir-riwayat-hidup.actions')
</div>
