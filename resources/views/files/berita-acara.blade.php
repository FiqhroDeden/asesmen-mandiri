<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berita Acara Hasil Asesmen</title>

    <script>
        window.addEventListener('load', function() {
            window.print();
        });
    </script>
</head>

<body style="margin-left: 30pt ;margin-right:30pt;">
    {{-- <div style="text-align:center">
        <img src="{{ asset('assets/kop-unpatti.png') }}" alt="">
    </div> --}}
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-align:center;"><span
            style="height:0pt; text-align:left; display:block; position:absolute; z-index:0;"><img
                src="{{ $logo }}" width="133" height="110" alt=""
                style="margin: 0 0 0 auto; display: block; "></span>KEMENTERIAN PENDIDIKAN KEBUDAYAAN,</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-align:center;">RISET DAN TEKNOLOGI</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-align:center; font-size:14pt;"><strong><span
                style="letter-spacing:2pt;">UNIVERSITAS PATTIMURA</span></strong></p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-indent:85.05pt; font-size:10pt;"><span
            style="letter-spacing:0.5pt;">Jalan. Ir. M. Putuhena Kampus Unpatti Poka-Ambon Kode Pos 97233</span></p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-indent:85.05pt; font-size:10pt;"><span
            style="letter-spacing:0.5pt;">Telepon, Faximile: (0911) 322626, (0911) 322627, (0911) 322628</span></p>
    <p
        style="margin-top:0pt;  margin-bottom:0pt; text-indent:85.05pt; border-bottom:4.5pt solid #000000; font-size:10pt;">
        <span style="letter-spacing:0.5pt; margin-left:36pt;">Laman:</span><em><span style="letter-spacing:0.5pt; ">&nbsp;</span></em><a
            href="http://www.unpatti.ac.id" style="text-decoration:none;"><em><span
                    style="letter-spacing:0.5pt; color:#000000;">www.unpatti.ac.id</span></em></a></p>
    <p style="margin-top:0pt; margin-left:99.35pt; margin-bottom:3pt; text-indent:8.65pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>BERITA ACARA HASIL ASESMEN</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify;">Pada hari ini
        &hellip;&hellip;&hellip;&hellip;.&hellip;&hellip; tanggal &hellip;&hellip;&hellip;.................. bulan
        &hellip;&hellip;&hellip;.. tahun &hellip;&hellip;&hellip;&hellip; bertempat di Ruang Ketua Program
        Studi&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..Fakultas
        &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. Universitas Pattimura,&nbsp;
        telah dilakukan Asesmen terhadap peserta Rekognisi Pembelajaran Lampau ( RPL ), sebagai berikut:</p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:justify;">No Peserta<span
            style="width:20.23pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span>:{{ $peserta->no_peserta }}
    </p>
    <p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:justify;">N a m a<span
            style="width:34.9pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span>:{{ $peserta->nama }}
    </p>
    <p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:justify;">Fakultas<span
            style="width:31.89pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span>:
    </p>
    <p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:justify;">Program Studi<span
            style="width:2.88pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span>:
        {{ $peserta->prodi->nama_prodi }}</p>
    <p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:justify;">Tempat/Tgl. Lahir<span
            style="width:19.92pt; display:inline-block;">&nbsp;</span>:
       {{$peserta->tempat_lahir}} / {{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('j-m-Y') }}</p>
    <p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:justify;">N I K<span
            style="width:9.22pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span>:
        {{ $peserta->nik }}</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span>Dengan Total Sks diakui : {{ $peserta->beritaAcara->total_sks_diakui }}
    </p>
    <p style="margin-top:0pt; margin-bottom:0pt;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span>Total Sks yang harus ditempuh :
        {{ $peserta->beritaAcara->total_sks_harus_ditempuh }}</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">Catatan:</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <table cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
        <tbody>
            <tr style="height:19.85pt;">
                <td style="width:496.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr style="height:19.85pt;">
                <td style="width:496.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr style="height:19.85pt;">
                <td style="width:496.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr style="height:19.85pt;">
                <td style="width:496.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt;">&nbsp;</p>
    <table cellspacing="0" cellpadding="0" style="width:522pt; border-collapse:collapse;">
        <tbody>
            <tr>
                <td colspan="2" style="width:511.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; text-align:center; font-size:11pt;"><strong>TIM
                            ASESOR</strong></p>
                    <p style="margin-top:3pt; margin-bottom:3pt; text-align:center; font-size:11pt;">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width:244.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">Asesor</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">_________________________</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">NIP.</p>
                </td>
                <td style="width:256.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-left:122.2pt; margin-bottom:0pt; font-size:11pt;">Ketua Program
                        Studi,</p>
                    <p style="margin-top:0pt; margin-left:122.2pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-left:122.2pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-left:122.2pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-left:122.2pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-left:122.2pt; margin-bottom:0pt; font-size:11pt;">
                        ________________________</p>
                    <p style="margin-top:0pt; margin-left:122.2pt; margin-bottom:0pt; font-size:11pt;">NIP.</p>
                </td>
            </tr>
            <tr>
                <td colspan="2"
                    style="width:511.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;">Mengetahui</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;">Wakil Dekan Bidang
                        Akademik,</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;">&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;">
                        ________________________</p>
                    <p style="margin-top:0pt; margin-left:188.5pt; margin-bottom:0pt; font-size:11pt;">NIP.</p>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
