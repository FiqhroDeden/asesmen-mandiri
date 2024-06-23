<ul class="menu p-4 w-80 min-h-full bg-base-100 text-base-content border-r-2 border-base-300 space-y-4 ">
    @if (Auth::user()->role == 'admin')
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('dashboard') }}" @class(['active' => Route::is('dashboard')]) wire:navigate>
                    <x-tabler-dashboard class="size-5" />
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Asesmen Prestasi</h2>
        <ul>
            <li>
                <a href="{{ route('peserta-prestasi') }}" @class(['active' => Route::is(['peserta-prestasi', 'peserta-prestasi.detail', 'peserta-prestasi.asesmen'])]) wire:navigate>
                    <x-tabler-users class="size-5" />
                    <span>Peserta Prestasi</span>
                </a>
            </li>
        </ul>
    </li>
    @endif
    @if (Auth::user()->role == 'peserta')
        <li>
            <h2 class="menu-title">Dashboard</h2>
            <ul>
                <li>
                    <a href="{{ route('biodata') }}" @class(['active' => Route::is('biodata')]) wire:navigate>
                        <x-tabler-user class="size-5" />
                        <span>Biodata</span>
                    </a>
                </li>
            </ul>
        </li>
        @if (Auth::user()->peserta->jalur_pendaftaran === '53')
        <li>
            <h2 class="menu-title">RPL</h2>
            <ul>
                @if (!Auth::user()->peserta->is_permanen)
                    <li>
                        <a href="{{ route('formulir-aplikasi-rpl') }}" @class(['active' => Route::is('formulir-aplikasi-rpl')]) wire:navigate>
                            <x-tabler-books class="size-5" />
                            <span>Formulir Aplikasi RPL</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bukti-pendukung') }}" @class(['active' => Route::is('bukti-pendukung')]) wire:navigate>
                            <x-tabler-cloud-upload  class="size-5" />
                            <span>Upload Bukti Pendukung</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('formulir-evaluasi-diri') }}" @class(['active' => Route::is('formulir-evaluasi-diri')]) wire:navigate>
                            <x-tabler-user-question class="size-5" />
                            <span>Formulir Evaluasi Diri</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('formulir-riwayat-hidup') }}" @class(['active' => Route::is('formulir-riwayat-hidup')]) wire:navigate>
                            <x-tabler-file-cv class="size-5" />
                            <span>Formulir Riwayat Hidup </span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('hasil-penilaian') }}" @class(['active' => Route::is('hasil-penilaian')]) wire:navigate>
                            <x-tabler-medal class="size-5" />
                            <span>Hasil Penilaian </span>
                        </a>
                    </li>
                @endif

            </ul>
        </li>
        @endif
        @if (Auth::user()->peserta->jalur_pendaftaran === '52')
        <li>
            <h2 class="menu-title">Prestasi</h2>
            <ul>

                    <li>
                        <a href="{{ route('asesmen-prestasi') }}" @class(['active' => Route::is('asesmen-prestasi')]) wire:navigate>
                            <x-tabler-books class="size-5" />
                            <span>Asesmen Prestasi</span>
                        </a>
                    </li>

            </ul>
        </li>
        @endif


    @endif

    @if (Auth::user()->role == 'kaprodi')
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('dashboard') }}" @class(['active' => Route::is('dashboard')]) wire:navigate>
                    <x-tabler-dashboard class="size-5" />
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Master Data</h2>
        <ul>

            <li>
                <a href="{{ route('matakuliah') }}" @class(['active' => Route::is('matakuliah')]) wire:navigate>
                    <x-tabler-books class="size-5" />
                    <span>Matakuliah</span>
                </a>
            </li>
        </ul>
    </li>
    @endif

    @if(Auth::user()->role == 'asesor')
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('dashboard') }}" @class(['active' => Route::is('dashboard')]) wire:navigate>
                    <x-tabler-dashboard class="size-5" />
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pakta-integritas') }}" @class(['active' => Route::is('pakta-integritas')]) wire:navigate>
                    <x-tabler-script class="size-5" />
                    <span>Pakta Integritas</span>
                </a>
            </li>
        </ul>
    </li>
        @if (Auth::user()->paktaIntegritas && Auth::user()->paktaIntegritas->file)
        <li>
            <h2 class="menu-title">Asesmen RPL</h2>
            <ul>
                <li>
                    <a href="{{ route('peserta-rpl') }}" @class(['active' => Route::is(['peserta-rpl', 'peserta-rpl.detail', 'peserta-rpl.asesmen'])]) wire:navigate>
                        <x-tabler-users-group class="size-5" />
                        <span>Peserta RPL</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

    @endif


</ul>
