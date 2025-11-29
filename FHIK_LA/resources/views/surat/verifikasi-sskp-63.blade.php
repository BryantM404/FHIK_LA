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

        .nomor, .perihal {
            text-align: left;
            margin-top: 2px;
        }

        .lampiran {
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

    <div class="nomor">No: {{ $nomorSurat }}</div>
    <div class="perihal">Perihal: Permohonan Memperoleh Izin Kerja Praktek - Pengantar MBKM Magang Mandiri</div>
    <div class="lampiran">Lampiran: -</div>

    <b>Yth. Bapak/Ibu Pimpinan</b> <br>
    <b>{{ $suratSPTA['tempatPenelitian'] }}</b> <br>
    <b>{{ $suratSPTA['alamatPenelitian'] }}</b>
    
    <p>Dengan Hormat,</p>
    <p>Sesuai dengan kurikulum Merdeka Belajar Kampus Merdeka yang berlaku saat ini pada Program Sarjana Desain Interior Fakultas Humaniora dan Industri Kreatif
        Universitas Kristen Maranatha, dengan ini mahasiswa kami tersebiut di bawah ini diwajibkan untuk menempuh kerja magang pada perusahaan selama 800 jam 
        (yang dilaksanakan secara onsite/WFO selama 15-20 minggu). Adapun materi yang diharapkan dari perusahaan Bapak/Ibu sebagai bekal pengalaman kerja bagi 
        mahasiswa adalah terlibat dalam proyek kompleksitas menengah ke atas (diharapkan proyek komersial atau non-residensial) yang meliputi pengalaman kerja berikut:
    </p>
    <ul type="disc">
        <li>Membuat rancangan desain interior arsitektur & furniture, mulai dari design brief, pembuatan konsep hinga produksi gambar kerja & gamnnar presentasi (2D/3D)</li>
        <li>Survey & pengukuran, kunjungan workshop/lapangan (site visit), rapat proyek (bertemu klien),</li>
        <li>Manajemen organisassi proyek terkait tahap pekerjaan desain, wawasan tentang dokumen terkait (KAK, Mom, gambar kerja, BQ, RAB, kurva S, Gantt Chart)</li>
        <li>Wawasan profesi desainer interior sesuai dengan praktik yang dilaksanakan perusahaan</li>
        <li>Trend desain & gaya hidup sesuai dengan proyek yang dikerjakan perusahaan</li>
    </ul>

    <p>Selanjutnya di akhir masa magang kerja mahasiswa diwajibkan membuat laporan Kuliah Kerja Praktik. Sehubungan dengan hal tersebut di atas,
        kami mohon bantuan Bapak/Ibu agar mengizinkan mahasiswa kami di bawah ini:
    </p>

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
    
    </table>

    <p class="content">
        untuk memperoleh kesempatan praktik kerja, serta menghimpun data dan keterangan yang diperlukan. Selama proses berlangsungnya praktik kerja
        mahasiswa ybs. akan menjaga protokol kesehatan dan bersedia ditegur apabila tidak memenuhi protokol kesehatan yang berlaku di perushaan/institusi 
        Bapak/Ibu. Demikian Permohonan ini kami sampaikan. Atas perhatian dan kerjasama Bapak/Ibu, kami ucapkan terimakasih.
    </p>

    <table width="100%" style="margin-top:30px;">
        <tr>
            <td width="50%" style="text-align:left; vertical-align:top;">
                Mengetahui, <br>
                Ketua Program Studi Desain Interior <br>
                {{ $pimpinan1['fakultas'] }} <br><br><br><br><br>

                <u>{{ $pimpinan1->pengguna->nama }}</u><br>
            </td>
            <td width="50%" style="text-align:left; vertical-align:top;">
                Bandung, <br>
                Koordinator Kerja Praktek <br>
                Program Studi Desain Interior <br><br><br><br><br>

                <u>{{ $pimpinan2->pengguna->nama }}</u><br>
            </td>
        </tr>
    </table>


</body>
</html>
