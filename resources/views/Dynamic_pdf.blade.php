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

            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
            margin-left:40px;
            color:black;
        }

    </style>

</head>

<body>
 
 @foreach($post as $post)
<br />
  <div class="container">
  
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4>Pegawai Data</h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="/Dynamic_Pdf/{{$post->id}}" class="btn btn-danger">Convert into PDF</a>
    </div>
   </div>
   <br />

   <br></br>


    <div id=halaman>
        

        

        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $post->nama_pegawai }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">No</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $post->no }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{ $post->alamat }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tahun Lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $post->tanggal_lahir }}</td>
            </tr>
        </table>
     

        
    </div>
    <br></br>
    @endforeach
</body>

</html>