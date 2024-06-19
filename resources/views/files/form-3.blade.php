@php
    $check_icon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="10" height="" viewBox="0 0 50 50">
                                <path d="M 42.875 8.625 C 42.84375 8.632813 42.8125 8.644531 42.78125 8.65625 C 42.519531 8.722656 42.292969 8.890625 42.15625 9.125 L 21.71875 40.8125 L 7.65625 28.125 C 7.410156 27.8125 7 27.675781 6.613281 27.777344 C 6.226563 27.878906 5.941406 28.203125 5.882813 28.597656 C 5.824219 28.992188 6.003906 29.382813 6.34375 29.59375 L 21.25 43.09375 C 21.46875 43.285156 21.761719 43.371094 22.050781 43.328125 C 22.339844 43.285156 22.59375 43.121094 22.75 42.875 L 43.84375 10.1875 C 44.074219 9.859375 44.085938 9.425781 43.875 9.085938 C 43.664063 8.746094 43.269531 8.566406 42.875 8.625 Z"></path>
                                </svg>';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir Aplikasi RPL</title>
    <style>
        body {
            font-family: "Calibri", sans-serif;
            font-size: 15px;
            line-height: normal;
        }

        .title {
            text-align: center;
            font-size: 16px;
            margin: 0;
            margin-bottom: 10px;
        }

        .question {
            margin: 0;
            margin-bottom: 6px;
        }

        .intro, .paragraph, .note {
            text-align: justify;
            margin: 6px 0;
        }

        .evidence-list, .principles-list, .declaration-list {
            margin-left: 20px;
        }

        .evidence-list li, .principles-list li, .declaration-list li {
            font-size: 12pt;
        }

        .evaluation-table, .course-table, .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .evaluation-table th, .evaluation-table td, .course-table th, .course-table td, .signature-table th, .signature-table td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
            vertical-align: top;
        }

        .evaluation-table th, .course-table th {
            background: #FFFFCC;
        }

        .super {
            vertical-align: super;
        }

        .empty-cell {
            width: 60%;
        }

    </style>
</head>
<body>
    <p class="title"><strong>FORMULIR&nbsp;</strong><strong>EVALUASI DIRI</strong></p>

    <table class="info-table">
        <tr>
            <td width="200px"><strong>NAMA PERGURUAN TINGGI </strong></td>
            <td width="20px"><strong>:</td>
            <td>UNIVERSITAS PATTIMURA</td>
        </tr>
        <tr>
            <td><strong>PROGRAM STUDI </strong></td>
            <td>:</td>
            <td>{{ $peserta->prodi->nama_prodi }}</td>
        </tr>
        <tr>
            <td><strong>Nama Calon </strong></td>
            <td>:</td>
            <td>{{ $peserta->nama }}</td>
        </tr>
        <tr>
            <td><strong>Tempat/Tgl lahir </strong></td>
            <td>:</td>
            <td>{{ $peserta->tempat_lahir }}/ {{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('j-m-Y') }}</td>
        </tr>
        <tr>
            <td><strong>Alamat </strong></td>
            <td>:</td>
            <td>{{ $peserta->alamat }}</td>
        </tr>
        <tr>
            <td><strong>Nomor Telpon/HP </strong></td>
            <td>:</td>
            <td>{{ $peserta->no_hp }}</td>
        </tr>
        <tr>
            <td><strong>Alamat E-Mail </strong></td>
            <td>:</td>
            <td>{{ $peserta->email }}</td>
        </tr>
        <tr>
            <td><strong>Nama Mata Kuliah </strong></td>
            <td></td>
            <td></td>
        </tr>
        @foreach ($peserta->formulirAplikasiRpl as $formulir)
            <tr>
                <td></td>
                <td>:</td>
                <td>{{ $formulir->matakuliah->nama }}</td>
            </tr>
        @endforeach

    </table>
    <br>
    <p class="intro"><strong>Pengantar</strong></p>
    <p class="paragraph">Tujuan pengisian Formulir Evaluasi Diri ini adalah agar calon dapat secara mandiri menilai tingkat profesiensi dari setiap kriteria unjuk kerja capaian pembelajaran mata kuliah atau modul pembelajaran dan menyampaikan bukti yang diperlukan untuk mendukung klaim tingkat profesiensinya.</p>
    <p class="paragraph">Isilah setiap kriteria unjuk kerja atau capaian pembelajaran pada halaman-halaman berikut sesuai dengan tingkat profesiansi yang saudara miliki. Saudara harus jujur dalam melakukan penilaian ini.</p>
    <p class="paragraph"><strong>Catatan</strong>: Jika saudara merasa yakin dengan kemampuan yang saudara miliki atas pencapaian profesiensi setiap kriteria unjuk kerja atau capaian pembelajaran yang dideskripsikan pada halaman berikut, dimohon saudara dapat melampirkan bukti yang valid, otentik, terkini, dan mencukupi untuk mendukung klaim saudara atas pencapaian profesiensi yang baik, dan/atau sangat baik tersebut.</p>

    <p class="paragraph">Identifikasi tingkat profesiensi pencapaian saudara dalam kriteria unjuk kerja atau capaian pembelajaran dengan menggunakan jawaban berikut ini:</p>

    <table class="evaluation-table">
        <thead>
            <tr>
                <th>Profisiensi/kemampuan</th>
                <th>Uraian</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Sangat baik</td>
                <td>
                    <ul>
                        <li>Saya melakukan tugas ini dengan sangat baik, atau</li>
                        <li>Saya menguasai bahan kajian ini dengan sangat baik, atau</li>
                        <li>Saya memiliki keterampilan ini, selalu digunakan dalam pekerjaan dengan tepat tanpa ada kesalahan</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Baik</td>
                <td>
                    <ul>
                        <li>Saya melakukan tugas ini dengan baik, atau</li>
                        <li>Saya menguasai bahan kajian ini dengan baik, atau</li>
                        <li>Saya memiliki keterampilan ini, dan kadang-kadang digunakan dalam pekerjaan</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Tidak pernah</td>
                <td>
                    <ul>
                        <li>Saya tidak pernah melakukan tugas ini, atau</li>
                        <li>Saya tidak menguasai bahan kajian ini, atau</li>
                        <li>Saya tidak memiliki keterampilan ini</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

    <p class="paragraph"><strong>Bukti</strong> yang dapat digunakan untuk mendukung klaim saudara atas pencapaian profesiensi yang baik dan atau sangat baik tersebut antara lain:</p>
    <ol class="evidence-list">
        <li>Ijazah dan/atau Transkrip Nilai dari Mata Kuliah yang pernah ditempuh di jenjang Pendidikan Tinggi sebelumnya (khusus untuk transfer sks);</li>
        <li>Daftar Riwayat pekerjaan dengan rincian tugas yang dilakukan;</li>
        <li>Sertifikat Kompetensi;</li>
        <li>Sertifikat pengoperasian/lisensi yang sesuai dengan jabatan kerja dimiliki;</li>
        <li>Foto pekerjaan yang pernah dilakukan dan deskripsi pekerjaan;</li>
        <li>Buku harian;</li>
        <li>Lembar tugas / lembar kerja ketika bekerja di perusahaan;</li>
        <li>Dokumen analisis/perancangan (parsial atau lengkap) ketika bekerja di perusahaan;</li>
        <li><em>Logbook;</em></li>
        <li>Catatan pelatihan di lokasi tempat kerja;</li>
        <li>Keanggotaan asosiasi profesi yang relevan;</li>
        <li>Referensi / surat keterangan/ laporan verifikasi pihak ketiga dari pemberi kerja / supervisor;</li>
        <li>Penghargaan dari industri; dan</li>
        <li>Penilaian kinerja dari perusahaan</li>
        <li>Dokumen lain yang relevan.</li>
    </ol>

    <p class="paragraph"><strong>Bukti</strong> (portofolio) untuk mendukung klaim calon atas pernyataan kriteria capaian pembelajaran mata kuliah atau modul pembelajaran yang dilampirkan calon pada saat mengajukan lamaran akan diverifikasi dan divalidasi oleh Asesor sesuai prinsip bukti, yaitu, sahih <strong>(V),</strong> otentik <strong>(A)</strong>, terkini <strong>(T)</strong> dan cukup <strong>(M),</strong> yaitu:</p>
    <ul class="principles-list">
        <li><strong>Valid/Sahih</strong>: ada hubungan yang jelas antara persyaratan bukti dari unit kompetensi/mata kuliah yang akan dinilai dengan bukti yang menjadi dasar penilaian;</li>
        <li><strong>Autentik/Asli</strong>: dapat dibuktikan bahwa buktinya adalah karya calon sendiri.</li>
        <li><strong>Terkini</strong>: bukti menunjukkan pengetahuan dan keterampilan kandidat saat ini;</li>
        <li><strong>Memadai/Cukup</strong>: kriteria mengacu kepada kriteria unjuk kerja dan panduan bukti; mendemonstrasikan kompetensi selama periode waktu tertentu; mengacu kepada semua dimensi kompetensi; dan mendemonstrasikan kompetensi dalam konteks yang berbeda;</li>
    </ul>

    @foreach ($formulirAplikasiRpl as $formulir)
        @if ($formulir->keterangan == 'perolehan-sks')

            <p class="paragraph">Pernyataan Kemampuan Akhir yang Diharapkan/Capaian Pembelajaran <strong>Mata Kuliah: {{ $formulir->matakuliah->kode }} - {{ $formulir->matakuliah->nama }}</strong></p>
            <p class="paragraph">{{ $formulir->matakuliah->uraian }}</p>

            <table class="course-table">
                <thead>
                    <tr>
                        <th rowspan="2">Kemampuan Akhir Yang Diharapkan/Capaian Pembelajaran Mata Kuliah</th>
                        <th colspan="3">Profesiensi pengetahuan dan keterampilan saat ini*</th>
                        <th colspan="4">Hasil evaluasi Asesor (diisi oleh Asesor)</th>
                        <th colspan="2">Bukti yang disampaikan*</th>
                    </tr>
                    <tr>
                        <th>Sangat baik</th>
                        <th>Baik</th>
                        <th>Tidak pernah</th>
                        <th>V</th>
                        <th>A</th>
                        <th>T</th>
                        <th>M</th>
                        <th width="20px">Nomor Dokumen</th>
                        <th>Jenis dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formulir->perolehanSks as $perolehanSks)
                        <tr>
                            <td>{{ $perolehanSks->cpm->capaian }}</td>
                            <td>{!! $perolehanSks->status_ketrampilan == 'SB' ? $check_icon : '' !!}</td>
                            <td>{!! $perolehanSks->status_ketrampilan == 'B' ? $check_icon : '' !!}</td>
                            <td>{!! $perolehanSks->status_ketrampilan == 'TP' ? $check_icon : '' !!}</td>

                            <td>{!! $perolehanSks->is_valid ? $check_icon : '' !!}</td>
                            <td>{!! $perolehanSks->is_autentik ? $check_icon : '' !!}</td>
                            <td>{!! $perolehanSks->is_terkini ? $check_icon : '' !!}</td>
                            <td>{!! $perolehanSks->is_memadai ? $check_icon : '' !!}</td>

                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

        @endif
    @endforeach


    <p class="note"><strong>Keterangan: tanda * diisi oleh pelamar RPL</strong></p>

    <p class="paragraph"><strong>Keterangan:</strong></p>
    <p class="paragraph"><strong>Kolom 1</strong> : Diisi oleh Program Studi, berupa Pernyataan Kemampuan Akhir yang diharapkan/Capaian Pembelejaran Mata Kuliah.</p>
    <p class="paragraph"><strong>Kolom 2</strong> : Diisi oleh Calon Mahasiswa/Pelamar RPL sesuai dengan tingkat profesiensi yang dikuasainya atas pernyataan yang diuraikan di kolom 1.</p>
    <p class="paragraph"><strong>Kolom 3</strong> : Diisi oleh Asesor setelah calon mengisi kolom 2 dan melampirkan BUKTI (portofolio) yang disebutkan pada kolom 5 dan disusun nomor sesuai yang dinyatakan pada kolom 4.</p>
    <p class="paragraph"><strong>Kolom 4</strong> : Nomor urut BUKTI Portofolio sebagaimana jenis BUKTI yang diuraikan pada kolom 4.</p>
    <p class="paragraph"><strong>Kolom 5</strong> : Jenis BUKTI Portofolio. Bukti ini dapat digunakan secara berulang untuk mendukung klaim beberapa pernyataan yang diuraikan pada kolom 1.</p>

    <p class="paragraph"><strong>Saya telah membaca dan mengisi Formulir Evaluasi Diri ini untuk mengikuti asesmen RPL dan dengan ini saya menyatakan:</strong></p>
    <ol class="declaration-list">
        <li>Semua informasi yang saya tuliskan adalah sepenuhnya benar dan saya bertanggung-jawab atas seluruh data dalam formulir ini dan apabila dikemudian hari ternyata informasi yang saya sampaikan tersebut adalah tidak benar, maka saya bersedia menerima sangsi sesuai dengan ketentuan yang berlaku;</li>
        <li>Saya memberikan ijin kepada pihak pengelola program RPL, untuk melakukan pemeriksaan kebenaran informasi yang saya berikan dalam formulir evaluasi diri ini kepada seluruh pihak yang terkait dengan data akademik sebelumnya dan kepada perusahaan tempat saya bekerja sebelumnya dan atau saat ini saya bekerja; dan</li>
        <li>Saya bersedia untuk mengikuti asesmen lanjutan untuk membuktikan kompetensi saya, sesuai waktu dan tempat/platform daring yang ditentukan oleh unit RPL.</li>
    </ol>

    <table class="signature-table">
        <tbody>
            <tr>
                <td rowspan="2" class="empty-cell"></td>
                <td>Tempat/Tanggal :</td>
            </tr>
            <tr>
                <td>
                    <p>Tanda tangan Pelamar :</p>
                    <br><br><br>
                    <p>(........................................................)</p>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="footer-note" id="ftn1">
        <p><a href="#_ftnref1" name="_ftn1" title=""><span class="super">[1]</span></a> Formulir Evaluasi Diri dibuat untuk setiap Mata Kuliah yang diberikan kesempatan untuk RPL, atau dapat dibuat dalam bentuk klaster Mata Kuliah</p>
    </div>
</body>
</html>
