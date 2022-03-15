<!DOCTYPE html>
<head>
    <title>Contoh Surat Pernyataan</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
        }

        #halaman{
            width: auto; 
            height: auto; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }

    </style>

</head>

<body>
 
 @foreach($post as $post)
<br />
  <div class="container">
   
    <div id=halaman>
        <h3 id=judul>SURAT PERNYATAAN {{ $post->jenis_surat }}</h3>

        <p>Saya yang bertanda tangan di bawah ini :</p>

        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $post->nama_pegawai }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Email</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $post->email }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{ $post->alamat }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Isi Surat</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $post->isi }}</td>
            </tr>
        </table>

        <p>menyatakan dengan sebenar-benarnya akan bersungguh-sungguh belajar dan bekerja.</p>

        <div style="width: 50%; text-align: left; float: right;">Purwodadi, 20 Januari 2020</div><br>
        <div style="width: 50%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: right;">{{ $post->nama_pegawai }}</div>

    </div>
   </div>
    @endforeach
</body>

</html>