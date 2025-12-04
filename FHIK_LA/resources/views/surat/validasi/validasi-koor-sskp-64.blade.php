<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Surat Survei Kerja Praktik</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 35px 45px;
            font-size: 12pt;
            line-height: 1.45;
        }

        .kop img {
            width: 100%;
            max-height: 110px;
            object-fit: contain;
            margin-top: -80px;
        }

        table.data-table {
            border-collapse: collapse;
            margin-top: -10px;
        }
        table.data-table td:first-child {
            width: 160px;     
        }
        table.data-table td:nth-child(2) {
            width: 10px;
        }

        .content {
            text-align: justify;
            margin-top: 10px;
        }

        .ttd {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="kop">
        <img src="{{ public_path('storage/material/kop/Kop Surat DKV.png') }}">
    </div>

    <table style="margin-top: 10px; margin-bottom: 25px; margin-left:-3px">
        <tr>
            <td style="width: 90px;">No</td>
            <td style="width: 10px;">:</td>
            <td>{{ $pengajuan->noSurat }}</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td>Surat Permohonan Kerja Praktik</td>
        </tr>
    </table>

    <b>Kepada yth.</b> <br>
    <b>{{ $suratSKP['tempatKP'] }}</b> <br>
    {{ $suratSKP['alamatKP'] }}
    
    <p>Dengan Hormat,</p>
    <p style="text-align: justify">Sesuai dengan kurikulum yang berlaku pada Fakultas Humaniora dan Industri Kreatif Universitas Kristen Maranatha, setiap mahasiswa diwajibkan membuat tugas dan
        laporan kerja praktik. Sehubungan dengan hal tersebut, kami mohon bantuan Bapak/Ibu agar mengizinkan mahasiswa kami tersebut di bawah ini:
    </p>

    <table width="80%" cellspacing="0" cellpadding="6" style="border:1px solid #000; border-collapse:collapse;">
        <tr>
            <td style="width:10%; border:1px solid #000;">NRP</td>
            <td style="width:70%; border:1px solid #000;">Nama Mahasiswa</td>
        </tr>
        <tr>
            <td style="border:1px solid #000;">{{ $pengguna['id'] }}</td>
            <td style="border:1px solid #000;">{{ $pengguna['nama'] }}</td>
        </tr>
    </table>

    
    <p style="text-align: justify">Untuk memperoleh kesempatan praktik kerja, memperoleh data dan keterangan yang diperlukan. Atas perhatian dan bantuan Bapak/Ibu, kami ucapkan terima kasih.
    </p>


    <table width="100%" style="margin-top:30px;">
        <tr>
            <td width="50%" style="text-align:left; vertical-align:top;">
                <br>
                Mengetahui,
                <br><br><br><br><br><br>

                <b>{{ $pimpinan1->pengguna->nama }}</b><br>
                Kaprog. Sarjana DKV UK Maranatha
            </td>
            <td width="50%" style="text-align:left; vertical-align:top;">
                Bandung, {{ $tanggalDisetujui }}<br>
                Hormat Kami,
                <br>
                <img src="{{ public_path($pimpinan2['ttdPath']) }}" alt="TTD" style="width:180px;"><br>
                <b>{{ $pimpinan2->pengguna->nama }}</b><br>
                Dosen Koordinator Kerja Praktik
            </td>
        </tr>
    </table>


</body>
</html>
