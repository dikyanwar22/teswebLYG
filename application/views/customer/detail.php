<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?= base_url('assets/adminLTE/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/datatables/dataTables.bootstrap.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminLTE/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets/adminLTE/dist/css/skins/_all-skins.min.css'); ?>">

  <!-- CSS membuat Bottom Navbar -->
  <style type="text/css">
  /*untuk layar device berukuran kecil*/
  @media screen and (max-device-width: 480px) {
    .ukuran_hp {
      visibility: hidden;
    }
    .no_hp {
      display: none;
    }
    .spacing-hp {
      padding-top: 12%;
    }

  }

  /*untuk layar device berukuran sedang*/
  @media screen and (min-width: 550px) {
   .ukuran_laptop {
     visibility: hidden;
   }
   .no_laptop {
     display: none;
   }

    .wabutton {
      width:15%;
    /*height:50px;*/
    position:fixed;
    bottom: 100px;
    right:10px;
    z-index:100;
    }

  }

  .buat-bottom-navbar {
    background-color: #483D8B;
    width: 100%;
    bottom: 0;
    height: 70px;
    overflow: hidden;
    position: fixed;
    z-index: 3;
    display: flex;
    flex-wrap: nowrap;
  }

  .buat-bottom-navbar a {
    display: block;
    color: #f2f2f2;
    text-decoration: none;
    width: 100%;
    margin: 10px;
    text-align: center;
    font-size: 10px;
  }

  .buat-bottom-navbar a:hover {
    background: #f1f1f1;
    color: white;
  }

  .buat-bottom-navbar a.active {
    background-color: green;
    color: blue;
  }
  </style>

</head>

<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <!-- <a href="<?= site_url('api/Documentation'); ?>" class="navbar-brand"><b>Logo</b></a> -->
            <a href="<?= current_url(); ?>" class="navbar-brand"><b>Detail Customer</b></a>
            <!-- <a href="" class="navbar-toggle collapsed">
              <i class="fa fa-bell"></i>
            </a> -->
          </div>
        </div>
      </nav>
    </header>

    <!-- Full Width Column -->
    <div class="content-wrapper">

      <section class="content container-fluid">

        <div class="row">
          <div class="col-md-12">
            <div class="box box-solid">

            <div class="box-body">
      <table id="tabel1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" colspan="2">
              <img width="100%" height="100%" src="<?= base_url('assets/img/'.$v->img); ?>">
            </th>
          </tr>
          <tr>
            <th>Nama</th>
            <th><?= $v->nama; ?></th>
          </tr>
          <tr>
            <th>HP</th>
            <th><?= $v->hp; ?></th>
          </tr>
          <tr>
            <th>Alamat</th>
            <th><?= $v->alamat; ?></th>
          </tr>
          <tr>
            <th>Hubungi WhatsApp</th>
            <th><a href="https://wa.me/62<?= substr($v->hp, 1); ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-phone"></i> Buka WhatsApp</a></th>
          </tr>
          <tr>
            <th>Lihat Maps</th>
            <th><a href="https://www.google.com/maps?q=<?= $v->latitude; ?>,<?= $v->longitude; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-map"></i> Buka Google Maps</a></th>
          </tr>
          <tr>
            <th>Bagikan Link</th>
            <th><a href="#" id="copyButton" class="btn btn-warning btn-sm"><i class="fa fa-arrow-right"></i> Bagikan Link</a></th>
          </tr>
        </thead>
      </table>
    </div>


            </div>
          </div>
        </div>


      </section>

    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer ukuran_hp no_hp">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; <?= date('Y'); ?> <a href="#">Diky Anwar</a>.</strong> All rights reserved.
      </div>
    </footer>

  </div>
  <!-- ./wrapper -->

  <!-- DataTables -->
  <script src="<?= base_url('assets/adminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?= base_url('assets/adminLTE/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>

  <!-- jQuery 2.1.4 -->
  <script src="<?= base_url('assets/adminLTE/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?= base_url('assets/adminLTE/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <!-- DataTables -->
  <script src="<?= base_url('assets/adminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?= base_url('assets/adminLTE/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url('assets/adminLTE/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
  <!-- FastClick -->
  <script src="<?= base_url('assets/adminLTE/plugins/fastclick/fastclick.min.js'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/adminLTE/dist/js/app.min.js'); ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/adminLTE/dist/js/demo.js'); ?>"></script>
  <!-- page script -->

  <script>
    document.getElementById('copyButton').addEventListener('click', function() {
        // Mendapatkan URL saat ini
        var currentUrl = window.location.href;

        // Membuat elemen input sementara untuk menyalin teks
        var tempInput = document.createElement('input');
        tempInput.value = currentUrl;
        document.body.appendChild(tempInput);

        // Memilih teks dalam elemen input
        tempInput.select();

        // Mencoba menyalin teks terpilih
        document.execCommand('copy');

        // Menghapus elemen input sementara
        document.body.removeChild(tempInput);

        // Memberi umpan balik bahwa URL telah disalin
        alert('URL telah disalin: ' + currentUrl);
    });
</script>


</body>
</html>
