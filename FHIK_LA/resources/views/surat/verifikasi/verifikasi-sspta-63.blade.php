<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Surat Survei Penelitian Tugas Akhir</title>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
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
        <img src="{{ public_path('storage/material/kop/Kop Surat DI.png') }}">
    </div>

    <table style="margin-top: 10px; margin-bottom: 25px; margin-left:-3px">
        <tr>
            <td style="width: 90px;">No</td>
            <td style="width: 10px;">:</td>
            <td>{{ $nomorSurat }}</td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td>Surat Permohonan Izin Penelitian</td>
        </tr>
    </table>
    
    <b>Yth. Bapak/Ibu Pimpinan</b> <br>
    <b>{{ $suratSPTA['tempatPenelitian'] }}</b> <br>
    <b>{{ $suratSPTA['alamatPenelitian'] }}</b>
    
    <p>Dengan Hormat,</p>
    <p style="text-align: justify; margin-top:-20px">Bersama surat ini mahasiswa Program Studi Desain Interior Fakultas Humaniora dan Industri Kreatif, Universitas Kristen Maranatha yang beridentitas:</p>

    <table class="data-table" style="margin-left:30px; margin-bottom:-10px">
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


    <p style="text-align: justify">Mengajukan Permohonan izin untuk melakukan penelitian kiranya Bapak/Ibu dapat membantu mahasiswa kami dengan memberi izin untuk memfoto
        , meminta data dan meminta denah di Instansi yang Bapak/Ibu pimpin guna menyelesaikan tugas mata kuliah {{ $suratSPTA['mataKuliah'] }}.
        Maka kami mohon perhatian serta bantuan sepenuhnya dari Bapak/Ibu, demi kelancaran tugas mahasiswa yang bersangkutan.
    </p>

    <p class="content" style="text-align: justify">
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
                Bandung, <br>
                Koordinator Tugas Akhir <br>
                Program Studi Desain Interior <br><br><br><br><br>

                <u>{{ $pimpinan2->pengguna->nama }}</u><br>
            </td>
        </tr>
    </table>


</body>
</html>
