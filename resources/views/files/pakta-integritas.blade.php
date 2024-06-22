<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pakta Integritas</title>
    <style>
        body {
            font-family: 'Times New Roman';
        }
        .center {
            text-align: center;
        }
        .indent {
            text-indent: 85pt;
        }
        .underline {
            border-bottom: 4.5pt solid #000;
            padding-bottom: 1pt;
        }
        .no-margin {
            margin: 0;
        }
        .table {
            width: 100%;
            margin: 0 9pt;
            border-collapse: collapse;
        }
        .table td {
            padding: 5pt;
            vertical-align: top;
            font-size: 11pt;
        }
        .table .label {
            width: 163pt;
        }
        .table .colon {
            width: 7pt;
        }
        .table .value {
            width: 238pt;
        }
        .ol-indent {
            padding-left: 4pt;
        }
        .signature {
            margin-left: 388pt;
            text-indent: 36pt;
        }
        .spacer-line {
            display: inline-block;
            width: 36pt;
        }
        .header {
            text-align: center;
            margin: 0 auto;
            padding: 20px;
        }
        .header img {
            float: left;
            /* margin-right: 10px; */
        }
        .header p {
            margin: 0;
            line-height: 1.2;
        }
        .header p.indent {
            text-indent: 1em;
        }
        .header .underline {
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }
        .header a {
            text-decoration: none;
            color: #0000ff;
        }
    </style>
    <script>
        window.addEventListener('load', function() {
            window.print();
        });
    </script>
</head>

<body>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-align:center;"><span
        style="height:0pt; text-align:left; display:block; position:absolute; z-index:0;"><img
            src="{{ $logo }}" width="133" height="110" alt=""
            style="margin: 0 0 0 auto; display: block; "></span>KEMENTERIAN PENDIDIKAN KEBUDAYAAN,</p>
<p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-align:center;">RISET DAN TEKNOLOGI</p>
<p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-align:center; font-size:14pt;"><strong><span
            style="letter-spacing:2pt;">UNIVERSITAS PATTIMURA</span></strong></p>
<p style="margin-top:0pt; margin-left:50pt; margin-bottom:0pt; text-indent:85.05pt; font-size:10pt;"><span
        style="letter-spacing:0.5pt;">Jalan. Ir. M. Putuhena Kampus Unpatti Poka-Ambon Kode Pos 97233</span></p>
<p style="margin-top:0pt; margin-left:50pt; margin-bottom:0pt; text-indent:85.05pt; font-size:10pt;"><span
        style="letter-spacing:0.5pt;">Telepon, Faximile: (0911) 322626, (0911) 322627, (0911) 322628</span></p>
<p
    style="margin-top:0pt;  margin-bottom:0pt; text-indent:85.05pt; border-bottom:4.5pt solid #000000; font-size:10pt;">
    <span style="letter-spacing:0.5pt; margin-left:50pt;">Laman:</span><em><span style="letter-spacing:0.5pt; ">&nbsp;</span></em><a
        href="http://www.unpatti.ac.id" style="text-decoration:none;"><em><span
                style="letter-spacing:0.5pt; color:#000000;">www.unpatti.ac.id</span></em></a></p>
<p style="margin-top:0pt; margin-left:99.35pt; margin-bottom:3pt; text-indent:8.65pt;">&nbsp;</p>
    <p class="center no-margin"><strong>PAKTA INTEGRITAS</strong></p>
    <p class="center no-margin"><strong>ASESOR RPL UNIVERSITAS PATTIMURA</strong></p>
    <div style="margin-left: 25px">
        <p class="spacer">Saya yang bertanda tangan:</p>
        <table class="table" >
            <tbody ">
                <tr>
                    <td class="label"><strong>Nama Lengkap</strong></td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>Jenis Kelamin</strong></td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>Jabatan Fungsional</strong></td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->jabatan_fungsional }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>NIK</strong></td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->nik }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>Tempat dan Tanggal Lahir</strong></td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->tempat_lahir }}, {{ \Carbon\Carbon::parse($paktaIntegritas->tanggal_lahir)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>E-Mail</strong></td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->email }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>Nomor Telepon/HP</strong></td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->no_hp }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>Alamat</strong></td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->alamat }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>Nomor Telepon/Fax</strong></td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->no_telp }}</td>
                </tr>
                <tr>
                    <td class="label">
                        <strong>Pendidikan</strong>
                    </td>
                </tr>
                <tr>
                    <td class="label">Bidang Keilmuan</td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->bidang_keilmuan }}</td>
                </tr>
                <tr>
                    <td class="label">Pendidikan Terakhir</td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->pendidikan_terakhir }}</td>
                </tr>
                <tr>
                    <td class="label">
                        <strong>Pekerjaan</strong>
                    </td>
                </tr>
                <tr>
                    <td class="label">Nama Instansi</td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->nama_instansi }}</td>
                </tr>
                <tr>
                    <td class="label">Jabatan</td>
                    <td class="colon">:</td>
                    <td class="value">{{ $paktaIntegritas->jabatan }}</td>
                </tr>
            </tbody>
        </table>


        <p class="spacer">Menyatakan bahwa saya akan melaksanakan ketentuan sebagai berikut:</p>
        <ol>
            <li class="ol-indent">Sanggup dan bersedia menjalankan tugas sebagai Asesor Program RPL secara jujur, bertanggung jawab dan menyelesaikan semua tugas-tugas serta mengacu pada ketentuan yang berlaku.</li>
            <li class="ol-indent">Bersedia mematuhi kode etik sebagai Asesor yang kompeten.</li>
            <li class="ol-indent">Tidak melakukan pelanggaran pidana selama melakukan tugas tanggung jawab sebagai Asesor, dalam menilai calon mahasiswa RPL.</li>
            <li class="ol-indent">Bersedia menerima Sanksi sesuai Ketentuan yang berlaku.</li>
        </ol>

        <p class="spacer"></p>
        <p class="spacer"></p>
        <p class="spacer"></p>
        <p class="spacer"></p>
        <p class="signature">...............................</p>
        <p style=" margin-left: 370pt;text-indent: 36pt;">
            ..........................................
        </p>
        <br><br>
        <p style="margin-left: 370pt; text-indent: 36pt;">
            ..................................................
        </p>
        <p style="margin-left: 370pt; text-indent: 36pt; margin-top: -10pt;">
            NIP. {{ $paktaIntegritas->nip }}
        </p>



    </div>
</body>
</html>
