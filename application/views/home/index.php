<section class="content">

  <!-- Notifikasi -->
  <?php echo $this->session->flashdata('msg'); ?>
  <!-- Notifikasi -->

  <div class="box">
    <!-- <div class="box-header">
      <a href="<?= site_url('Home/add'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
    </div> -->

    <div class="box-body">
    <div class="table-responsive">
      <table id="tabel1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Style</th>
            <th>Total Size</th>
            <th>Total Output</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          foreach($data as $key => $val) :
        ?>
          <tr>
            <td><?= $val->TrnDate; ?></td>
            <td><?= $val->StyleCode; ?></td>
            <td><?= $val->SizeName; ?></td>
            <td><?= $val->QtyOutput; ?></td>
            <td>
              <a href="#" id="dateData<?= $val->TrnDate; ?>" class="btn btn-primary btn-sm show-detail"><i class="fa fa-search"></i></a>
            </td>
          </tr>
        <?php $no++; endforeach; ?>
        </tbody>
      </table>
    </div>
    </div>

  </div>

  <div id="showDetail" class="box">
    <div class="box-body">
    <div class="table-responsive">
      <table id="tabel1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th rowspan="2" class="text-center">Operator</th>
            <th colspan="6" class="text-center">Size</th>
            <th rowspan="2" class="text-center">Total QTY</th>
            <th rowspan="2" class="text-center">Destination</th>
          </tr>
          <tr>
            <th>XS</th>
            <th>S</th>
            <th>M</th>
            <th>L</th>
            <th>XL</th>
            <th>XXL</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          foreach($data as $key => $val) :
        ?>
          <tr>
            <td>M Zaidan</td>
            <td>15</td>
            <td>25</td>
            <td>0</td>
            <td>30</td>
            <td>17</td>
            <td>11</td>
            <td class="text-center">98</td>
            <td>HK (Hongkong)</td>
          </tr>
        <?php $no++; endforeach; ?>
        </tbody>
      </table>
    </div>
    </div>

  </div>

  <div id="activator"></div>
</section>

<script>
  $(document).ready(function() {
    $('#showDetail').hide();
    $('.show-detail').on('click', function(event) {
      event.preventDefault();
      $('#showDetail').show();
    });
  });
</script>

<!-- DataTables -->
<script src="<?= base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>

<!-- Custom Datatables -->
<script>
  $(document).ready(function() {
    $('#tabel1').DataTable();
  });
</script>
<!-- Custom Datatables -->
