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
            margin-bottom: 20px;
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

    <div class="nomor">No: {{ $pengajuan['noSurat'] }}</div>
    <div class="lampiran">Lampiran: -</div>
    <div class="perihal">Perihal: Surat Pengantar Survey</div>

    <b>Kepada yth.</b> <br>
    <b>{{ $suratSPTA['tempatPenelitian'] }}</b> <br>
    <b>{{ $suratSPTA['alamatPenelitian'] }}</b>
    
    <p>Dengan Hormat,</p>
    <p>Melalui surat ini, kami memohon agar mahasiswa program sarjana Desain Komunikasi Visual Fakultas Humaniora dan Industri Kreatif Universitas Kristen Maranatha di bawah ini:
    </p>

    <table width="100%" cellspacing="0" cellpadding="6" style="border:1px solid #000; border-collapse:collapse;">
        <tr>
            <td style="width:10%; border:1px solid #000;">No</td>
            <td style="width:20%; border:1px solid #000;">NRP</td>
            <td style="width:50%; border:1px solid #000;">Nama Mahasiswa</td>
            <td style="width:20%; border:1px solid #000;">Telp</td>
        </tr>
        <tr>
            <td style="border:1px solid #000;">1</td>
            <td style="border:1px solid #000;">{{ $pengguna['id'] }}</td>
            <td style="border:1px solid #000;">{{ $pengguna['nama'] }}</td>
            <td style="border:1px solid #000;">{{ $mahasiswaDetail['noHandphone'] ?: $mahasiswaDetail['telpon'] }}</td>
        </tr>
    </table>
    
    <p>Diijinkan untuk melakukan survey untuk Foto Tempat, Meminta Data, Meminta Denah, Wawancara, Tour Lokasi dan dokumentasi video di Lembaga Bapak/Ibu. Survey ini dilakukan
        untuk keperluan Tugas Akhir Mata Kuliah {{ $suratSPTA['mataKuliah'] }} pada Program Sarjana Desain Komunikasi Visual Fakultas Humaniora dan Industri Kreatif Universitas
        Kristen Maranatha, dengan topik <b>"{{ $suratSPTA['judulTugas'] }}."</b>
    </p>
    <p>Mahasiswa yang bersangkutan akan menjaga protokol kesehatan selama proses survey dan bersedia ditegur bila tidak memenuhi protokol yang berlaku di tempat Bapak/Ibu.
    </p>
    <p>Atas bantuannya, kami ucapkan terima kasih</p>

    <table width="100%" style="margin-top:30px;">
        <tr>
            <td width="50%" style="text-align:left; vertical-align:top;">
                Mengetahui,<br>
                Kaprodi Desain Komunikasi Visual <br>
                {{ $pimpinan1['fakultas'] }}
                 <br><br><br><br><br>

                <b>{{ $pimpinan1->pengguna->nama }}</b><br>
            </td>
            <td width="50%" style="text-align:left; vertical-align:top;">
                Bandung, {{ $tanggalDisetujui }}<br>
                Hormat Kami, <br>
                Dosen Koordinator Tugas Akhir <br>
                Prodi DKV - FHIK
                <br>
                <img src="{{ public_path($pimpinan2['ttdPath']) }}" alt="TTD" style="width:180px;"><br>
                <b>{{ $pimpinan2->pengguna->nama }}</b><br>
            </td>
        </tr>
    </table>


</body>
</html>
