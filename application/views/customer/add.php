<section class="content">
<!-- Notifikasi -->
<?php echo $this->session->flashdata('msg'); ?>
  <!-- Notifikasi -->
  <div class="box box-solid">
    <div class="box-header with-border">
      <i class="fa fa-list-alt"></i>
      <h3 class="box-title">Tambah Data</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div>
          <form action="<?= site_url('Home/add_action'); ?>" method="post" enctype="multipart/form-data">  
          <div class="widget-content">
                <div class="form-group">

                  <div class="col-lg-4 col-md-12">
                    <div class="control-group">
                      <label>Foto Rumah Customer</label>
                      <input type="file" name="rumah" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
                    <div class="control-group">
                      <label>Nama Customer</label>
                      <input type="text" name="nama" placeholder="ex: Diky Anwar" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
                    <div class="control-group">
                      <label>HP</label>
                      <input type="text" name="hp" placeholder="ex: 089xxx" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="control-group">
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control" placeholder="ex: Jl. Kebon Nanas No. 01 Ds Sukamaju Kec. Selalu Rame" required></textarea>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6" hidden>
                    <div class="control-group">
                      <label>Latitude</label>
                      <input type="text" id="latitude" name="latitude" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6" hidden>
                    <div class="control-group">
                      <label>Longitude</label>
                      <input type="text" id="longitude" name="longitude" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" name="submit" class="btn btn-primary submit" value="Submit" style="width: 100%;margin-top: 5px;"><i class="fa fa-plus"></i> Tambahkan</button>
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

<script src="<?= base_url('assets/js/google-maps-jquery.min.js'); ?>"></script>
<script type="text/javascript">

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(showPosition, showError);
} else {
  alert("Geolocation is not supported by this browser.");
}

function showPosition(position) {
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;

  document.getElementById('latitude').value = latitude;
  document.getElementById('longitude').value = longitude;
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      alert("User denied the request for Geolocation.");
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location information is unavailable.");
      break;
    case error.TIMEOUT:
      alert("The request to get user location timed out.");
      break;
    case error.UNKNOWN_ERROR:
      alert("An unknown error occurred.");
      break;
  }
}

</script>