<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengajuan Surat Akademik</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #e85c25;
            font-family: "Poppins", sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: white;
            width: 400px;
            padding: 40px 40px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 8px 8px 0px rgba(0,0,0,0.15);
        }

        .login-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 16px;
            font-weight: 500;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .login-options {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .option {
            text-align: center;
            cursor: pointer;
        }

        .option a {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: black;
            padding: 10px;
        }

        .option a:hover {
            color: #e85c25;
        }

        .user-icon {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            border: 2px solid #333;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 42px;
            margin-bottom: 8px;
        }


        a.option-text {
            text-decoration: none;
            color: black;
            font-weight: 600;
        }

        a.option-text:hover {
            color: #e85c25;
        }

        #kanan{
            margin-right: -20px;
        }
    </style>

</head>
<body>

    <div class="login-card">
        <div class="login-title">LOGIN</div>

        <div>APLIKASI SURAT AKADEMIK <br> FHIK – UK . MARANATHA</div>

        <div class="subtitle">Masuk sebagai:</div>

        <div class="login-options">

            <!-- Mahasiswa -->
            <div class="option">
                <a href="{{ route('loginMahasiswa') }}">
                    <div class="user-icon">👤</div>
                    <div>Mahasiswa</div>
                </a>
            </div>

            <!-- Admin / Operator / Pimpinan -->
            <div class="option" id="kanan">
                <a href="{{ route('loginPegawai') }}">
                    <div class="user-icon">👤</div>
                    <div>Admin / Operator / Pimpinan</div>
                </a>
            </div>

        </div>

    </div>

</body>
</html>
