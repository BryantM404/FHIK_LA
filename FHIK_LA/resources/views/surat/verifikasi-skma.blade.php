<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Mahasiswa</title>

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
            text-align: center;
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
        <img src="{{ public_path('storage/material/kop/Kop Surat FHIK.png') }}">
    </div>

    <div class="judul">SURAT KETERANGAN MAHASISWA</div>
    <div class="nomor">No: {{ $nomorSurat }}</div>

    <p style="margin-top:-10px">Yang bertandatangan di bawah ini :</p>

    <table class="data-table">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $pimpinan1->pengguna->nama }}</td>
        </tr>
        <tr>
            <td>N I K</td>
            <td>:</td>
            <td>{{ $pimpinan1->pengguna->id }}</td>
        </tr>

        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td rowspan="2">
                {{ $pimpinan1['jabatan'] }} {{ $pimpinan1['fakultas'] }}<br>
                Universitas Kristen Maranatha
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    <p>Dengan ini menyatakan dengan sesungguhnya, bahwa :</p>

    <table class="data-table">
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
            <td>Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $mahasiswaDetail['tempatTanggalLahir'] }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $mahasiswaDetail['alamat'] }}</td>
        </tr>
    </table>

    <p>yang bersangkutan adalah benar mahasiswa kami pada :</p>

    <table class="data-table">
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td>{{ $pengguna['programStudi'] }}</td>
        </tr>
        <tr>
            <td>Tahun Akademik</td>
            <td>:</td>
            <td>{{ $suratKMA['tahunAkademik'] }}</td>
        </tr>
    </table>

    <p>Dan benar bahwa orang tua / wali mahasiswa tersebut adalah :</p>

    <table class="data-table">
        <tr>
            <td>N a m a</td>
            <td>:</td>
            <td>{{ $mahasiswaDetail['namaWali'] }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $mahasiswaDetail['alamatOrangTua'] }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $mahasiswaDetail['pekerjaanOrangTua'] }}</td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td>:</td>
            <td>{{ $suratKMA['instansi'] ?: '-' }}</td>
        </tr>
        <tr>
            <td>Pangkat/Golongan</td>
            <td>:</td>
            <td>{{ $suratKMA['pangkatGolongan'] ?: '- / -' }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $suratKMA['jabatan'] ?: '-' }}</td>
        </tr>
    </table>

    <p class="content">
        Demikian Surat Keterangan ini kami buat untuk dapat dipergunakan sebagaimana mestinya.
        Atas perhatian dan kerjasama saudara kami ucapkan terimakasih.
    </p>

    <div class="ttd">
        Bandung, <br><br><br><br>

        <u>{{ $pimpinan1->pengguna->nama }}</u><br>
        {{ $pimpinan1['jabatan'] }} {{ $pimpinan1['fakultas'] }}<br>
        Universitas Kristen Maranatha
    </div>

</body>
</html>
