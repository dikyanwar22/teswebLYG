<!-- Main content -->
<section class="content">

  <div class="box box-solid">
    <div class="box-header with-border">
      <i class="fa fa-list-alt"></i>
      <h3 class="box-title">Edit Data</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div>
            <form action="<?= site_url('Home/edit_action/'.$v->id); ?>" method="post" enctype="multipart/form-data">
              <div class="widget-content">
                <div class="form-group">

                  <div class="col-lg-4 col-md-12" hidden>
                    <div class="control-group">
                      <label>Foto Rumah Customer</label>
                      <input type="text" name="rumah_lama" value="<?= $v->img; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
                    <div class="control-group">
                      <label>Foto Rumah Customer</label>
                      <input type="file" name="rumah" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
                    <div class="control-group">
                      <label>Nama Customer</label>
                      <input type="text" name="nama" value="<?= $v->nama; ?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
                    <div class="control-group">
                      <label>HP</label>
                      <input type="text" name="hp" value="<?= $v->hp; ?>" placeholder="ex: 089xxx" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="control-group">
                      <label>Alamat</label>
                      <textarea name="alamat" value="" class="form-control" required><?= $v->alamat; ?></textarea>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" name="submit" class="btn btn-primary submit" value="Submit" style="width: 100%;margin-top: 5px;"><i class="fa fa-pencil"></i> Perbarui</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
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
