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

        .nomor {
            text-align: left;
            margin-top: 2px;
        }

        .perihal {
            text-align: left;
            margin-top: 2px;
            margin-bottom: 25px;
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
    <div class="perihal">Perihal: Permohonan Izin Penelitian</div>

    <b>Yth. Bapak/Ibu Pimpinan</b> <br>
    <b>{{ $suratSPTA['tempatPenelitian'] }}</b> <br>
    <b>{{ $suratSPTA['alamatPenelitian'] }}</b>
    
    <p>Dengan Hormat,</p>
    <p>Bersama surat ini mahasiswa Program Studi Desain Interior Fakultas Humaniora dan Industri Kreatif, Universitas Kristen Maranatha yang beridentitas:</p>


    <table class="data-table" style="margin-left:30px">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $pengguna['nama'] }}</td>
        </tr>
        <tr>
            <td>NRP</td>
            <td>:</td>
            <td>{{ $pengguna['id'] }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $mahasiswaDetail['email'] }}</td>
        </tr>
        <tr>
            <td>Judul Tugas</td>
            <td>:</td>
            <td>{{ $suratSPTA['judulTugas'] }}</td>
        </tr>
        <tr>
            <td>Dosen Mata Kuliah</td>
            <td>:</td>
            <td>{{ $suratSPTA['dosenMataKuliah'] }}</td>
        </tr>

    </table>

    <p>Akan Melakukan Pengumpulan data penelitian di :</p>

    <table class="data-table" style="margin-left:30px">
        <tr>
            <td>Tempat Penelitian</td>
            <td>:</td>
            <td>{{ $suratSPTA['tempatPenelitian'] }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $suratSPTA['alamatPenelitian'] }}</td>
        </tr>
    </table>


    <p>Mengajukan Permohonan izin untuk melakukan penelitian kiranya Bapak/Ibu dapat membantu mahasiswa kami dengan memberi izin untuk memfoto
        , meminta data dan meminta denah di Instansi yang Bapak/Ibu pimpin guna menyelesaikan tugas mata kuliah {{ $suratSPTA['mataKuliah'] }}.
        Maka kami mohon perhatian serta bantuan sepenuhnya dari Bapak/Ibu, demi kelancaran tugas mahasiswa yang bersangkutan.
    </p>

    <p class="content">
        Demikian Surat Keterangan ini kami sampaikan. Atas perhatian dan kerjasama Bapak/Ibu, kami ucapkan terimakasih.
    </p>

    <table width="100%" style="margin-top:30px;">
        <tr>
            <td width="50%" style="text-align:left; vertical-align:top;">
                Mengetahui, <br>
                Ketua Prodi. Desain Interior <br>
                {{ $pimpinan1['fakultas'] }} <br>
                Universitas Kristen Maranatha <br><br><br><br><br>

                <u>{{ $pimpinan1->pengguna->nama }}</u><br>
            </td>
            <td width="50%" style="text-align:left; vertical-align:top;">
                Bandung, {{ $tanggalDisetujui }}<br>
                Koordinator Tugas Akhir <br>
                Program Studi Desain Interior <br>
                <img src="{{ public_path($pimpinan2['ttdPath']) }}" alt="TTD" style="width:180px;"><br>
                <u>{{ $pimpinan2->pengguna->nama }}</u><br>
            </td>
        </tr>
    </table>


</body>
</html>
