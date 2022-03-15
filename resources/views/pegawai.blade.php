@extends('layout.app')
@section('content')
<!DOCTYPE html>
<html>
 
<head>
    <title>CRUD AJAX LARAVEL</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{ asset('css/pegawai.css') }}" rel="stylesheet">
    <!-- AKHIR STYLE CSS -->
</head>
 
<body>
  

  
    <!-- MULAI CONTAINER -->
    <div class="container" style="margin-top:50px">

         <div class="row" style="width:100%">

               <div class="card"  id="#card" style="padding:10px;">
                 
                 <div class="bdy">
                   <!-- MULAI TOMBOL TAMBAH -->
                    <a href="javascript:void(0)" class="btn tambah" id="tombol-tambah">Tambah PEGAWAI</a>
                    <br><br>
                    <!-- AKHIR TOMBOL -->
                 </div>  
                    <!-- MULAI TABLE -->
                     <div class="col-lg-12 col-sm-12 hero-feature" >
                        <div class="table-responsive">

                             <table class="table table-striped table-bordered table-sm" id="table_pegawai" >
                        <thead style=" background-image: linear-gradient(to bottom right, #fa6969, #f7f7f7);" >
                            <tr>
                                <th >Agama</th>
                                <th >File</th>
                                <th>Nama</th>
                                <th>tanggal lahir</th>
                                <th>no telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                        </div>
                     </div>
                    <!-- AKHIR TABLE -->   
                </div>
          <div class="">
        
    </div>
    <!-- AKHIR CONTAINER -->
 
    <!-- MULAI MODAL FORM TAMBAH/EDIT-->
    <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-12">
 
                                <input type="hidden" name="id" id="id">
 
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Agama</label>
                                    <div class="col-sm-12">

                                            <input type="radio"  value="Islam" id="agama" name="agama"
                                                        checked>
                                            <label for="huey">Islam</label>
                                             <input type="radio"  value="Islam" id="agama" name="agama"
                                                        checked>
                                              <label for="huey">Islam</label>
                                     
                                    </div>
                                </div>
 
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nama Pegawai</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                                            value="" required>
                                    </div>
                                </div>
 
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">tanggal_lahir</label>
                                     <?php
                                    // Sets the top option to be the current year. (IE. the option that is chosen by default).
                                    $currently_selected = date('Y'); 
                                    // Year to start available options at
                                    $earliest_year = 1950; 
                                    // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                                    $latest_year = date('Y'); 

                                    print '<select name="tanggal_lahir" id="tanggal_lahir" class="tanggal_lahir">';
                                    // Loops over each int[year] from current year, back to the $earliest_year [1950]
                                    foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                        // Prints the option with the next year in range.
                                        print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                    }
                                    print '</select>';
                                    ?>
                                </div>
 
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nomor</label>
                                    <div class="col-sm-12">
                                        <input type="input" class="form-control" id="no" name="no" value=""
                                            required>
                                    </div>
                                </div>
 
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">File KTP</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="file" name="file" value=""
                                            required>
                                    </div>
                                </div>
 
                            </div>
 
                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                    value="create">Simpan
                                </button>
                            </div>
                        </div>
 
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL -->
 
    <!-- MULAI MODAL KONFIRMASI DELETE-->
 
    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PERHATIAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Jika menghapus Pegawai maka</b></p>
                    <p>*data pegawai tersebut hilang selamanya, apakah anda yakin?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus
                        Data</button>
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL -->
 
 
 
    <!-- LIBARARY JS -->
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
 
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
 
 

    
   
    <!-- AKHIR LIBARARY JS -->
 
    <!-- JAVASCRIPT -->
    <script>
        //CSRF TOKEN PADA HEADER
        //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        //TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        $('#tombol-tambah').click(function () {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Pegawai Baru"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });
        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function () {
            $('#table_pegawai').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('pegawai.index') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'agama',
                        name: 'agama'
                    },
                     {
                        data: 'file',
                        name: 'file'
                    },
                    
                     
                    {
                        data: 'nama_pegawai',
                        name: 'nama_pegawai'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'tanggal_lahir'
                    },
                    {
                        data: 'no',
                        name: 'no'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                order: [
                    [0, 'asc']
                ]
            });
        });
        //SIMPAN & UPDATE DATA DAN VALIDASI (Stanggal_lahir CLIENT)
        //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');
                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('pegawai.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#table_pegawai').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil dtanggal_lahirmpan pada postanggal_lahir kanan bawah
                                title: 'Data Berhasil Dtanggal_lahirmpan',
                                message: '{{ Session('
                                success ')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }
        //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            $.get('pegawai/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                 $('#agama').val(data.agama);
                 $('#file').val(data.file);
                $('#nama_pegawai').val(data.nama_pegawai);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#no').val(data.no);
                $('#alamat').val(data.alamat);
            })
        });
        //jika klik class show (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
   
       
        $('body').on('click', '.show-post', function () {
           
            dataId = $(this).attr('id');
             
           
               $.ajax({
                   url:"DynamicPdf/"+dataId ,
                    success:function(data) {
                      $("body").html(data);
                      
                     // This will navigate to your preferred location
                     window.location.href = url;   
                },
                   
               })
               
        });
 
           // $('#tombol-show').click(function () {
                
       // });
    
        
 
        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });
        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({
                url: "pegawai/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_pegawai').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });

       


    </script>
 
    <!-- JAVASCRIPT -->
</body>
 
</html>
@endsection