<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Riwayat Hidup (Form 7)</title>
    <style>
        body {
            font-family: "Calibri", sans-serif;
            font-size: 15px;
            line-height: 1.15;
            margin: 0;
        }
        .center {
            text-align: center;
        }
        .justify {
            text-align: justify;
        }
        .background-grey {
            background: #CCCCCC;
        }
        .strong {
            font-weight: bold;
        }
        .underline {
            text-decoration: underline;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid windowtext;
            padding: 5px;
        }
        .spacer {
            margin-bottom: 10px;
        }
    </style>
    <script>
        window.addEventListener('load', function() {
            window.print();
        });
    </script>
</head>
<body>
    <p class="center strong"><span style="font-size: 16px;">FORMULIR DAFTAR RIWAYAT HIDUP</span><span style="font-size: 16px;"><em> (CURRICULUM VITAE)</em></span></p>

    <p class="background-grey strong underline"><span style="font-size: 16px; color: black;">DATA DIRI</span></p>

    <table>
        <tr>
            <td width="200px">Nama</td>
            <td width="50px">:</td>
            <td>{{ $peserta->nama }}</td>
        </tr>
        <tr>
            <td>Tempat dan Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $peserta->tempat_lahir }}, {{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('j-m-Y') }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $peserta->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>{{ $peserta->status_perkawinan }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $peserta->agama }}</td>
        </tr>
        <tr>
            <td>Institusi Tempat Bekerja</td>
            <td>:</td>
            <td>{{ $peserta->tempat_kerja }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $peserta->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Status Pekerjaan</td>
            <td>:</td>
            <td>{{ $peserta->status_pekerja }}</td>
        </tr>
        <tr>
            <td>Alamat Tempat Bekerja</td>
            <td>:</td>
            <td>{{ $peserta->alamat_tempat_kerja }}</td>
        </tr>
        <tr>
            <td>Telp./Faks.</td>
            <td>:</td>
            <td>{{ $peserta->telp_faks }}</td>
        </tr>
        <tr>
            <td>Alamat Rumah</td>
            <td>:</td>
            <td>{{ $peserta->alamat }}</td>
        </tr>
        <tr>
            <td>Telp./HP</td>
            <td>:</td>
            <td>{{ $peserta->no_hp }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $peserta->email }}</td>
        </tr>
    </table>

    @foreach ($riwayatHidupForms as $form)
    <br>
    <p class="strong underline"><span style="font-size: 16px; color: black;">{{ $form->name }}</span></p>
    <table class="table">
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

                    </tr>
                @endfor
            @endif
        </tbody>
    </table>

    <br><br>
    @endforeach


    <br><br><br><br><br><br>
    <p class="justify">Saya menyatakan bahwa semua keterangan dalam Daftar Riwayat Hidup ini adalah benar dan saya bertanggung-jawab atas data yang disampaikan ini. Jika di kemudian hari ternyata informasi yang saya sampaikan tidak benar, saya bersedia menerima sanksi sesuai dengan ketentuan yang berlaku dan apabila terdapat kesalahan, saya bersedia mempertanggungjawabkannya.</p>

    <table style="width: 100%; border-collapse: collapse; border: none; margin-left: 20px; margin-right: 100px">
        <tr>
            @if ($peserta->tempat_kerja == '')
            <td style="">
                <p>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>
                <p></p>
                <br><br><br>
                <p></p>
            </td>
            @else
            <td style="">
                <p>Mengetahui</p>
                <p>Nama Pimpinan Langsung</p>
                <br><br><br>
                <p>-------------------------------------</p>
            </td>
            @endif


            <td style="margin-left: -150px">
                <p style="margin-left: -150px">.............., ..........................</p>
                <p style="margin-left: -150px">Yang menyatakan,</p>
                <br><br><br>
                <p style="margin-left: -150px">-------------------------------------</p>
            </td>
        </tr>
    </table>
</body>
</html>
