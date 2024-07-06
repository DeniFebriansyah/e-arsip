<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Disposisi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    ol {
        list-style: none;
    }

    ol>li {
        padding-left: 1rem;
    }

    table {
        border-collapse: collapse;
    }

    table>tbody>tr>td {
        padding-left: 10px;
        height: 1.5rem;
        border: 1px solid #000;
    }

    .signature-line {
        display: inline-grid !important;
        border-top: 1px solid black;
        margin-top: 3.7rem;
        display: block;
        width: 50%;
    }

    input[type="text"] {
        width: 28px;
        height: 20px;
    }
    </style>
</head>

<body style="background-color:#fff;">
    <div style="border:1px solid #000;">
        <div style="padding:2rem;">
            <div style="display:flex;">
                <img src="{{asset('assets/img/favicon/logo.png')}}" alt=""
                    style="width:20%; height:20%;aspect-ratio:3/3">
                <div style="text-align:center; display:grid; margin-left:1rem; ">
                    <h2 style="font-weight:normal;">PEMERINTAH PROVINSI JAMBI</h2>
                    <h2>BADAN KESATUAN BANGSA DAN POLITIK</h2>
                    <P>Jl. R. M. Nur Atmadibrata No.4 Telanaipura, Jambi 36122</P>
                    <P>Telepon (0741) 62322 Fax (0747) 64341, laman kesbangpol.jambiprov.go.id</P>
                </div>
            </div>
        </div>
        <div style="border-top: 1px solid #000; padding:10px;">
            <div style="margin: 10px 1px;">
                <b>PERINGATAN:</b>
            </div>
            <ol>
                <li>1. Dilarang memisahakan sehelai surat pun yang tergabung dalam berkas ini.</li>
                <li>2. Jika mengenai soal rahasia, bantulah memelihara kerahasiaan negara</li>
                <li>3. Disposisi hanya disampaikan kepada yang berhak</li>
            </ol>
            <div style="display:flex; justify-content:center">
                <p style="margin:10px; letter-spacing:5px">LEMBAR DISPOSISI</p>
            </div>
        </div>
        <table style="border:1px solid #000; width:100%;">
            <tbody>
                <tr>
                    <td width="20%">Surat dari</td>
                    <td width="20%"></td>
                    <td width="20%">Surat dari</td>
                    <td width="20%"></td>
                    <td width="20%"></td>
                </tr>
                <tr>
                    <td width="20%" colspan="2"></td>
                    <td width="20%">No Agenda</td>
                    <td width="20%"></td>
                    <td width="20%"></td>
                </tr>
                <tr>
                    <td width="20%">No. Surat</td>
                    <td width="20%"></td>
                    <td width="20%">Sifat</td>
                    <td width="20%"></td>
                    <td width="20%"></td>
                </tr>
                <tr style="height:3rem;">
                    <td width="20%">Tanggal Surat</td>
                    <td width="20%"></td>
                    <td width="20%" style="padding-left:10px"><input type="text"> Sangat Segera</td>
                    <td width="20%" style="padding-left:10px"><input type="text"> Segera</td>
                    <td width="20%" style="padding-left:10px"><input type="text"> Rahasia</td>
                </tr>
                <tr style="height:3rem;">
                    <td width="20%">Hal</td>
                    <td width="20%" colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 1rem;">Diteruskan Kepada</td>
                    <td colspan="3" style="padding-left: 1rem;">Dengan hormat harap</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 3rem;">Sekretaris</td>
                    <td colspan="3" style="padding-left: 3rem;">Tanggapan dan Saran</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 3rem;">Kabid I</td>
                    <td colspan="3" style="padding-left: 3rem;">Proses lebih lanjut</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 3rem;">Kabid II</td>
                    <td colspan="3" style="padding-left: 3rem;">Koordinasi/Konfirmasikan</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 3rem;">Kabid III</td>
                    <td colspan="3" style="padding-left: 3rem;">........................</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 3rem;">Kabid IV</td>
                    <td colspan="3" style="padding-left: 3rem;">........................</td>
                </tr>
                <tr style="height:10rem;">
                    <td colspan="2" style="align-content:start; padding: 1rem;">Catatan:</td>
                    <td colspan="3" style="border-bottom:1px solid #000; text-align:center;">Kepala
                        Badan <br> <span class="signature-line"> </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>