<!-- Main content -->
<section class="content">

  <!-- Notifikasi -->
  <?php echo $this->session->flashdata('msg'); ?>
  <!-- Notifikasi -->

  <div class="box box-solid">
    <div class="box-header with-border">
      <i class="fa fa-list-alt"></i>
      <h3 class="box-title">Report Data</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div>
            <form action="<?= current_url(); ?>" class="form-horizontal form-validation" method="post" accept-charset="utf-8">
              <div class="widget-content">
                <div class="form-group">

                  <div class="col-lg-6 col-md-6">
                    <div class="control-group">
                      <label>Tanggal Awal</label>
                      <input type="date" name="start_date" class="form-control" value="<?= $start_date; ?>" required>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                    <div class="control-group">
                      <label>Tanggal Akhir</label>
                      <input type="date" name="end_date" class="form-control" value="<?= $end_date; ?>" required>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" name="find" class="btn btn-primary submit" value="Submit" style="width: 100%;margin-top: 5px;"><i class="fa fa-search"></i> Temukan</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="box">
    <div class="box-header">
      <a href="<?= site_url('Home/add'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
    </div>

    <div class="box-body">
    <div class="table-responsive">
      <table id="tabel1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if (is_array($data) || is_object($data)) :
          $no=1;
          foreach($data as $key => $val) :
          $params_id = base64_encode($val->id);
          $id = rawurlencode($params_id);
        ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $val->nama; ?></td>
            <td>
              <a href="https://wa.me/62<?= substr($val->hp, 1); ?>" target="_blank"><?= $val->hp; ?></a>
            </td>
            <td><?= $val->alamat; ?></td>
            <td>
              <a href="<?= site_url('Home/edit/'.$id); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>&ensp;
              <a href="<?= site_url('Mobile/detail/'.$id); ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a>
            </td>
          </tr>
        <?php $no++; endforeach; endif;?>
        </tbody>
      </table>
    </div>
    </div>

  </div>

  <div id="activator"></div>
</section>

<!-- DataTables -->
<script src="<?= base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>

<!-- Custom Datatables -->
<script>
  $(document).ready(function() {
    $('#tabel1').DataTable();
    $('#tabel2').DataTable();
    $('#tabel3').DataTable();
    $('#tabel4').DataTable();
    $('#tabel5').DataTable();
  });
</script>
<!-- Custom Datatables -->
