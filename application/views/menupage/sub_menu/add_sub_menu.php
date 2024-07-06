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
    <link rel="stylesheet" href="<?= base_url('assets/stisla/assets/modules/select2/dist/css/select2.min.css'); ?>">
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
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Form <?= $title; ?></h4>
                  </div>
                  <div class="card-body">
                    <form action="<?= site_url('Menu/action_add_sub_menu'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label><b>Nama Menu - [Nama Modul]</b></label>
                      <select name="menu_id" class="form-control select2" required>
                        <option value="">-Pilih-</option>
                        <?php foreach($menu->result() as $key => $v) : ?>
                        <option value="<?= $v->id; ?>">[Menu: <?= $v->menu; ?>]</option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label><b>Nama Sub Menu</b></label>
                      <input type="text" id="menu" name="sub_menu" placeholder="Nama Sub Menu" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label><b>URI</b></label>
                      <input type="text" id="uri" name="uri" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label><b>Icon Sub Menu</b></label>
                      <input type="text" name="icon" placeholder="Icon Sub Menu" class="form-control">
                    </div>
                    <div class="form-group">
                      <label><b>Hak Akses</b></label>
                      <div class="custom-control custom-checkbox">
                        <?php
                          $data = $level->result();
                          for($i=0; $i < count($data); $i++) :
                        ?>
                        <input type="checkbox" name="hak_akses[]" value="<?= $data[$i]->id; ?>" class="control-input">
                        <label class="label"><?= $data[$i]->nama; ?></label>&ensp;&ensp;&ensp;
                        <?php endfor; ?>
                      </div>
                    </div>

                    <div class="card-footer text-center">
                      <button type="button" onclick="window.history.back()" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</button>
                      &ensp;
                      <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Simpan</button>
                    </div>
                  </form>
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

  <!-- Select2 -->
  <script src="<?= base_url('assets/stisla/assets/modules/select2/dist/js/select2.full.min.js'); ?>"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#menu').on('keyup', function() {
      var menu = $(this).val();
      let kalimat = menu.replace(/ /g, "_");
      let url = kalimat.toLowerCase();
      $('#uri').val(url);
    });
  });
</script>
</body>
</html>
