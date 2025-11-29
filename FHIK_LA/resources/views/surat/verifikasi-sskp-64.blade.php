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

        .judul {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            margin-top: 5px;
            font-size: 14pt;
        }

        .nomor, .lampiran {
            text-align: left;
            margin-top: 2px;
        }

        .perihal {
            text-align: left;
            margin-top: 2px;
            margin-bottom: 40px;
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
        <img src="{{ public_path('storage/material/kop/Kop Surat DI.png') }}">
    </div>

    <div class="nomor">No: {{ $nomorSurat }}</div>
    <div class="lampiran">Lampiran: -</div>
    <div class="perihal">Perihal: Surat Permohonan Kerja Praktik</div>

    <b>Kepada yth.</b> <br>
    <b>{{ $suratSPTA['tempatPenelitian'] }}</b>
    <p>{{ $suratSPTA['alamatPenelitian'] }}</p>
    
    <p>Dengan Hormat,</p>
    <p>Sesuai dengan kurikulum yang berlaku pada Fakultas Humaniora dan Industri Kreatif Universitas Kristen Maranatha, setiap mahasiswa diwajibkan membuat tugas dan
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

    
    <p>Untuk memperoleh kesempatan praktik kerja, memperoleh data dan keterangan yang diperlukan. Atas perhatian dan bantuan Bapak/Ibu, kami ucapkan terima kasih.
    </p>


    <table width="100%" style="margin-top:30px;">
        <tr>
            <td width="50%" style="text-align:left; vertical-align:top;">
                Mengetahui,
                 <br><br><br><br><br>

                <b>{{ $pimpinan1->pengguna->nama }}</b><br>
                Kaprog. Sarjana DKV UK Maranatha
            </td>
            <td width="50%" style="text-align:left; vertical-align:top;">
                Bandung, <br>
                Hormat Kami,
                <br><br><br><br><br>

                <b>{{ $pimpinan2->pengguna->nama }}</b><br>
                Dosen Koordinator Kerja Praktik
            </td>
        </tr>
    </table>


</body>
</html>
