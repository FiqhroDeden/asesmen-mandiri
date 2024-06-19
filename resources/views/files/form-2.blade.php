<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 2</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.3;
        }
        .center {
            text-align: center;
        }
        .justify {
            text-align: justify;
        }
        .indent {
            text-indent: -14.2pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 5.4pt;
        }
        th {
            vertical-align: top;
        }
        .section-title {
            margin-bottom: 10pt;
        }
        .small-text {
            font-size: 8pt;
        }
        .small-text sup {
            font-size: 6.67pt;
        }
        .bordered-table th, .bordered-table td {
            border: 1.5pt solid #000;
        }
        .bordered-table th {
            border-bottom: 1.5pt double #000;
        }
        .bordered-table td:first-child {
            border-left: 1.5pt double #000;
        }
        .bordered-table td:last-child {
            border-right: 1.5pt double #000;
        }
        .hidden {
            display: none;
        }
    </style>
     <script>
        window.addEventListener('load', function() {
            window.print();
        });
    </script>
</head>
<body>
    <div>
        <p class="center"><strong>FORMULIR APLIKASI RPL (<em>Form 2</em>/F02)</strong></p>
        <table>
            <tr>
                <td width="250px">Program Studi</td>
                <td>:</td>
                <td>{{ $peserta->prodi->nama_prodi }}</td>
            </tr>
            <tr>
                <td>Jenjang</td>
                <td>:</td>
                <td>{{ $peserta->prodi->nama_jenjang }}</td>
            </tr>
            <tr>
                <td>Nama Perguruan Tinggi</td>
                <td>:</td>
                <td>Universitas Pattimura</td>
            </tr>
        </table>

        <p class="section-title"><strong>Bagian 1: Rincian Data Calon Mahasiswa</strong></p>
        <p class="justify">Pada bagian ini, cantumkan data pribadi, data pendidikan formal serta data pekerjaan saudara pada saat ini.</p>
        <p><strong>a. Data Pribadi</strong></p>

        <table>
            <tr>
                <td width="250px">Nama lengkap</td>
                <td>:</td>
                <td>{{ $peserta->nama }}</td>
            </tr>
            <tr>
                <td>Tempat / tgl. lahir</td>
                <td>:</td>
                <td>{{ $peserta->tempat_lahir }} /{{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('j-m-Y') }}
            </td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>:</td>
                <td>{{ $peserta->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>{{ $peserta->status_perkawinan }}</td>
            </tr>
            <tr>
                <td>Kebangsaan</td>
                <td>:</td>
                <td>{{ $peserta->kebangsaan }}</td>
            </tr>
            <tr>
                <td>Alamat rumah</td>
                <td>:</td>
                <td>{{ $peserta->alamat }}</td>
            </tr>

            <tr>
                <td>Kode Pos </td>
                <td>:</td>
                <td>{{ $peserta->kode_pos }}</td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>:</td>
                <td>
                   {{$peserta->no_hp}}
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                   {{$peserta->email}}
                </td>
            </tr>
        </table>


        <p><strong>b. Data Pendidikan</strong></p>
        <table>
            <tr >
                <td width="250px">Pendidikan terakhir</td>
                <td>:</td>
                <td>{{ $peserta->pendidikan_terakhir }}</td>
            </tr>
            <tr>
                <td>Nama Perguruan Tinggi/Sekolah</td>
                <td>:</td>
                <td>{{ $peserta->nama_pt }}</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>{{ $peserta->program_studi }}</td>
            </tr>
            <tr>
                <td>Tahun lulus</td>
                <td>:</td>
                <td>{{ $peserta->tahun_lulus }}</td>
            </tr>
        </table>
    </div>
    <div style="margin-bottom: 300px"></div>
    <div>
        <p class="section-title"><strong>Bagian 2: Daftar Mata Kuliah</strong></p>
        <p class="justify">Pada bagian 2 ini, cantumkan Daftar Mata Kuliah pada Program Studi yang saudara ajukan untuk memperoleh pengakuan berdasarkan kompetensi yang sudah saudara peroleh dari pendidikan formal sebelumnya (melalui <strong>Transfer sks</strong>), dan dari pendidikan nonformal, informal atau pengalaman kerja (melalui asesmen untuk <strong>Perolehan sks</strong>), dengan cara memberi tanda pada pilihan <strong>Ya</strong> atau <strong>Tidak.</strong></p>
        <p class="justify">Daftar Mata Kuliah Program Studi :  {{ $peserta->prodi->nama_prodi }}</p>

        <table class="bordered-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>sks</th>
                    <th>Mengajukan RPL</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
           <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($peserta->formulirAplikasiRpl as $form2)


            <tr>
                <td class="center">{{ $no++ }}</td>
                <td class="center">{{ $form2->matakuliah->kode }}</td>
                <td class="center">{{ $form2->matakuliah->nama }}</td>
                <td class="center">{{ $form2->matakuliah->sks }}</td>
                <td class="center">Ya</td>
                <td class="center">{{ $form2->keterangan == 'transfer-sks' ? 'Transfer SKS' : 'Perolehan SKS' }}</td>
            </tr>
            @endforeach
           </tbody>
        </table>

        <p class="justify">Bersama ini saya mengajukan permohonan untuk dapat mengikuti Rekognisi Pembelajaran Lampau (RPL) dan dengan ini saya menyatakan bahwa:</p>
        <ol class="justify">
            <li>Semua informasi yang saya tuliskan adalah sepenuhnya benar dan saya bertanggung-jawab atas seluruh data dalam formulir ini, dan apabila dikemudian hari ternyata informasi yang saya sampaikan tersebut adalah tidak benar, maka saya bersedia menerima sanksi sesuai dengan ketentuan yang berlaku;</li>
            <li>Saya memberikan ijin kepada pihak pengelola program RPL, untuk melakukan pemeriksaan kebenaran informasi yang saya berikan dalam formulir aplikasi ini kepada seluruh pihak yang terkait dengan jenjang akademik sebelumnya dan kepada perusahaan tempat saya bekerja sebelumnya dan atau saat ini saya bekerja;</li>
            <li>Saya akan mengikuti proses asesmen sesuai dengan jadwal/waktu yang ditetapkan oleh Perguruan Tinggi.</li>
        </ol>

        <table style="">
            <tr>
                <td rowspan="2">
                    <p style="height: 61.85pt;"></p>
                </td>
                <td>Tempat/Tanggal :</td>
            </tr>
            <tr style="height:61.85pt;">
                <td style="width:196pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle;">
                    <p style="margin-top:6pt; margin-bottom:10pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Tanda tangan Pelamar :</span></p>
                    <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">(........................................................)</span></p>
                </td>
        </table>
        {{-- <br><br>
        <p><strong>Lampiran yang disertakan:</strong></p>
        <ol>
            <li>Formulir Evaluasi Diri sesuai dengan Daftar Mata Kuliah yang diajukan untuk RPL disertai dengan bukti pendukung pemenuhan Capaian Pembelajarannya.</li>
            <li>Daftar Riwayat Hidup (Form 7/F07)</li>
            <li>Ijazah dan Transkrip Nilai</li>
            <li>Lainnya/sebutkan.......................................</li>
        </ol> --}}
    </div>


</body>
</html>
