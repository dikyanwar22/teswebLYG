  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla/assets/modules/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/stisla/assets/modules/fontawesome/css/all.min.css'); ?>">
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/stisla/assets/css/components.css'); ?>">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
  </head>

  <body class="layout-3">
    <div id="app">
      <div class="main-wrapper container">
        <div class="navbar-bg"></div>

        <nav class="navbar navbar-secondary navbar-expand-lg">
          <div class="container">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="<?= site_url('Menu'); ?>" class="nav-link"><i class="far fa-clone"></i><span>Menu</span></a>
              </li>
              <li class="nav-item active">
                <a href="<?= site_url('Menu/submenu'); ?>" class="nav-link"><i class="far fa-clone"></i><span>Sub Menu</span></a>
              </li>
            </ul>
          </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1><?= $title; ?></h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#"><?= $title; ?></a></div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="<?= site_url('Menu/add_sub_menu'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                  </div>

                  <div class="card-body">
                    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th>Fungsi di Controller</th>
                            <th>Sub Menu</th>
                            <th>Akses Level</th>
                            <th>Menu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            foreach($sub as $key => $v) :
                              $params_id = base64_encode($v->id);
                              $id = rawurlencode($params_id);
                          ?>
                          <tr>
                            <td class="text-center"><?= $no; ?></td>
                            <td><?= $v->class; ?> / <b style="color: red"><?= $v->function; ?></b></td>
                            <td><i class="<?= $v->icon; ?>"></i> <?= $v->sub_menu; ?></td>
                            <td>
                              <?php foreach($akses[$v->id] as $nilai) : ?>
                                <li><?= $nilai; ?></li>
                              <?php endforeach; ?>
                            </td>
                            <td><?= $v->menu; ?></td>
                            <td><?= ($v->deleted == '0') ? 'Tampil' : 'Tutup'; ?></td>
                            <td>
                              <a href="<?= site_url('Menu/edit_sub_menu/'.$id); ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            </td>
                          </tr>
                          <?php $no++; endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </section>
        </div>
        <!-- Main Content -->

        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2018 <div class="bullet"></div> Created By : Diky Anwar
          </div>
          <div class="footer-right">

          </div>
        </footer>
      </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('assets/stisla/assets/modules/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/stisla/assets/modules/popper.js'); ?>"></script>
    <script src="<?= base_url('assets/stisla/assets/modules/tooltip.js'); ?>"></script>
    <script src="<?= base_url('assets/stisla/assets/modules/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/stisla/assets/modules/nicescroll/jquery.nicescroll.min.js'); ?>"></script>
    <script src="<?= base_url('assets/stisla/assets/modules/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/stisla/assets/js/stisla.js'); ?>"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url('assets/stisla/assets/modules/datatables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/stisla/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/stisla/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js'); ?>"></script>
    <script src="<?= base_url('assets/stisla/assets/modules/jquery-ui/jquery-ui.min.js'); ?>"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('assets/stisla/assets/js/page/modules-datatables.js'); ?>"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('assets/stisla/assets/js/scripts.js'); ?>"></script>
    <script src="<?= base_url('assets/stisla/assets/js/custom.js'); ?>"></script>

    <script>
      $(document).ready(function() {

        function hak_akses() {
          let level_id = [];
          $('input[name="level_id[]"]').each((index, element) => level_id.push($(element).val()));
          $.ajax({
            url: "<?= site_url('Modul/hak_akses'); ?>",
            type: 'POST',
            dataType: 'JSON',
            data: {
              id : level_id
            },
            success: function(response) {

              var nomor = 1;
              var no = 1;
              var hitung = Object.keys(response).length;

              for (var i = 0; i < hitung; i++) {
                $('#nomor_'+response[i].id).text(no++);
                $('#hak_akses_'+response[i].id).text(response[i].nama);
              }


            }
          })
        }
        hak_akses();

      });
    </script>
  </body>
  </html>
