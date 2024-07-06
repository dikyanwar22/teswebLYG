<section class="content container-fluid" id="LoadContentData">
<style type="text/css">
    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background: url(https://naikbnk.link/uploads/employee/230910193859.png);
        background-color: #fff;
        background-size: contain;
        background-repeat: no-repeat;
        display: inline-block;
    }

    .imgUp {
        margin-bottom: 15px;
    }
</style>
<script type="text/javascript">
    $(function() {
        $(document).on("change", ".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                    $('#btn-update').show();
                }
            }

        });
    });
</script>
<div class="row">
<div class="col-md-6">
<div class="box box-danger">
<div class="box-body box-profile">
<table class="table table-responsive table-bordered table-striped">
<thead>
<tr>
<th>Foto</th>
<th colspan="3" align="center">Info</th>
</tr>
</thead>
<tbody>
<tr>
<td width="30%" rowspan="7" class="imgUp">
<form action="https://naikbnk.link/index.php/hrd/employee/update_foto/" class="form-horizontal form-validation" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="imagePreview"></div>
<input type="hidden" name="method" value="details">
<input type="hidden" name="nik" value="22038">
<button type="submit" name="update_foto" id="btn-update" class="btn btn-success" value="Submit" style="display: none;">Upload</button>
</form>

</td>
<td>Company</td>
<td width="1%">:</td>
<td>BHINNEKA SANGKURIANG CIREBON PILANG</td>
</tr>
<tr>
<td>NIK</td>
<td width="1%">:</td>
<td>22038</td>
</tr>
<tr>
<td>Tanggal Masuk</td>
<td width="1%">:</td>
<td>02 Juni 2023</td>
</tr>
<tr>
<td>KTP</td>
<td width="1%">:</td>
<td>3209181812960008</td>
</tr>
<tr>
<td>Nama</td>
<td width="1%">:</td>
<td>Diky Anwar</td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td width="1%">:</td>
<td>PRIA</td>
</tr>
<tr>
<td>Status</td>
<td width="1%">:</td>
<td><span class="label" style="background-color:#8BC34A; color: white; padding:5px;">ENABLE</span></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-md-6">
<div class="box box-danger">
<div class="box-header">
<h3 class="box-title"><i class="fa fa-list-alt"></i> Status Validasi</h3>
</div>
<div class="box-body box-profile">
<label class="alert alert-info" style="width: 100%;text-align-last: center;">Sudah Diajukan Menunggu diproses</label>
</div>
<div class="box-footer box-profile">
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="nav-tabs-custom active">
<ul class="nav nav-tabs in" role="tablist">
<li class="active"><a href="https://naikbnk.link/index.php/hrd/employee/profile_detail?method=details&amp;nik=22038" class="active">Personal Details</a></li>
<li><a href="https://naikbnk.link/index.php/hrd/employee/profile_detail?method=educations&amp;nik=22038">Educations &amp; Experiences</a></li>
<li><a href="https://naikbnk.link/index.php/hrd/employee/profile_detail?method=skills&amp;nik=22038">Skills</a></li>
<li><a href="https://naikbnk.link/index.php/hrd/employee/profile_detail?method=positions&amp;nik=22038">Positions</a></li>
</ul>
<div class="tab-content" style="padding:15px;">
<div class="tab-pane fade in active">
<div class="row">
<div class="col-md-6">
<div class="box box-solid box-info">
<div class="box-header">
<h3 class="box-title"><i class="fa fa-list-alt"></i> Basic Information</h3>
<div class="box-tools pull-right">
</div>
</div>
<div class="box-body">
<table class="table table-responsive table-bordered table-striped">
<tbody>
<tr>
<td>Tempat Lahir</td>
<td width="1%">:</td>
<td>CIREBON</td>
</tr>
<tr>
<td>Tanggal Lahir</td>
<td width="1%">:</td>
<td>18 Desember 1996</td>
</tr>
<tr>
<td>Email</td>
<td width="1%">:</td>
<td>dikyanwar22@gmail.com</td>
</tr>
<tr>
<td>No. Handphone</td>
<td width="1%">:</td>
<td>089514760700</td>
</tr>
<tr>
<td>Status Pernikahan</td>
<td width="1%">:</td>
<td>BELUM KAWIN</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-md-6">
<div class="box box-solid box-info">
<div class="box-header">
<h3 class="box-title"><i class="fa fa-building"></i> Addresses</h3>
<div class="box-tools pull-right">
</div>
</div>
<div class="box-body">
<div id="tabel_address_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="tabel_address_length"><label>Show <select name="tabel_address_length" aria-controls="tabel_address" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="tabel_address_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="tabel_address"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-responsive table-bordered table-striped dataTable no-footer" id="tabel_address" role="grid" aria-describedby="tabel_address_info">
<thead>
<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="tabel_address" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No.: activate to sort column descending" style="width: 39.375px;">No.</th><th class="sorting" tabindex="0" aria-controls="tabel_address" rowspan="1" colspan="1" aria-label="Alamat Kategori: activate to sort column ascending" style="width: 140.953px;">Alamat Kategori</th><th class="sorting" tabindex="0" aria-controls="tabel_address" rowspan="1" colspan="1" aria-label="Alamat Detail: activate to sort column ascending" style="width: 120.047px;">Alamat Detail</th><th class="sorting" tabindex="0" aria-controls="tabel_address" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 45.125px;">Aksi</th></tr>
</thead>
<tbody>
<tr class="odd"><td valign="top" colspan="4" class="dataTables_empty">No data available in table</td></tr></tbody>
</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="tabel_address_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="tabel_address_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="tabel_address_previous"><a href="#" aria-controls="tabel_address" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button next disabled" id="tabel_address_next"><a href="#" aria-controls="tabel_address" data-dt-idx="1" tabindex="0">Next</a></li></ul></div></div></div></div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="box box-solid box-info">
<div class="box-header">
<h3 class="box-title"><i class="fa fa-users"></i> Family Members</h3>
<div class="box-tools pull-right">
</div>
</div>
<div class="box-body">
<div id="tabel_family_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="tabel_family_length"><label>Show <select name="tabel_family_length" aria-controls="tabel_family" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="tabel_family_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="tabel_family"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-responsive table-bordered table-striped dataTable no-footer" id="tabel_family" role="grid" aria-describedby="tabel_family_info">
<thead>
<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="tabel_family" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No.: activate to sort column descending" style="width: 23.9375px;">No.</th><th class="sorting" tabindex="0" aria-controls="tabel_family" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 39.5781px;">Nama</th><th class="sorting" tabindex="0" aria-controls="tabel_family" rowspan="1" colspan="1" aria-label="Jenis Kelamin: activate to sort column ascending" style="width: 91.9688px;">Jenis Kelamin</th><th class="sorting" tabindex="0" aria-controls="tabel_family" rowspan="1" colspan="1" aria-label="Hubungan Keluarga: activate to sort column ascending" style="width: 129.25px;">Hubungan Keluarga</th><th class="sorting" tabindex="0" aria-controls="tabel_family" rowspan="1" colspan="1" aria-label="Tanggal Lahir: activate to sort column ascending" style="width: 88.9062px;">Tanggal Lahir</th><th class="sorting" tabindex="0" aria-controls="tabel_family" rowspan="1" colspan="1" aria-label="Alamat: activate to sort column ascending" style="width: 47.75px;">Alamat</th><th class="sorting" tabindex="0" aria-controls="tabel_family" rowspan="1" colspan="1" aria-label="No Telepon: activate to sort column ascending" style="width: 73.9531px;">No Telepon</th><th class="sorting" tabindex="0" aria-controls="tabel_family" rowspan="1" colspan="1" aria-label="Pendidikan: activate to sort column ascending" style="width: 75.0781px;">Pendidikan</th><th class="sorting" tabindex="0" aria-controls="tabel_family" rowspan="1" colspan="1" aria-label="Pekerjaan: activate to sort column ascending" style="width: 66.7656px;">Pekerjaan</th><th class="sorting" tabindex="0" aria-controls="tabel_family" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 28.8125px;">Aksi</th></tr>
</thead>
<tbody>
<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr></tbody>
</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="tabel_family_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="tabel_family_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="tabel_family_previous"><a href="#" aria-controls="tabel_family" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button next disabled" id="tabel_family_next"><a href="#" aria-controls="tabel_family" data-dt-idx="1" tabindex="0">Next</a></li></ul></div></div></div></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="activator">
</div>
<script>
    $(document).ready(function() {
        $('#tabel_family').DataTable()
        $('#tabel_address').DataTable()
        $('.select2').select2()

        $('#basic_information').click(function() {
            var id = $(this).attr('rel');
            $.ajax({
                url: 'https://naikbnk.link/index.php/hrd/employee/basic_information/' + id,
                dataType: 'html',
                beforeSend: function() {
                    $.blockUI({
                        css: {
                            border: 'none',
                            backgroundColor: '#000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .5,
                            color: '#fff'
                        }
                    });
                },
                success: function(data) {
                    setTimeout(function() {
                        $.unblockUI();
                        $('#activator').html(data);
                    }, 1000);
                }
            });
        });

        $('#address').click(function() {
            var id = $(this).attr('rel');
            $.ajax({
                url: 'https://naikbnk.link/index.php/hrd/employee/address/insert/' + id,
                dataType: 'html',
                beforeSend: function() {
                    $.blockUI({
                        css: {
                            border: 'none',
                            backgroundColor: '#000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .5,
                            color: '#fff'
                        }
                    });
                },
                success: function(data) {
                    setTimeout(function() {
                        $.unblockUI();
                        $('#activator').html(data);
                    }, 1000);
                }
            });
        });

        $('#family_members').click(function() {
            var id = $(this).attr('rel');
            $.ajax({
                url: 'https://naikbnk.link/index.php/hrd/employee/family_members/insert/' + id,
                dataType: 'html',
                beforeSend: function() {
                    $.blockUI({
                        css: {
                            border: 'none',
                            backgroundColor: '#000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .5,
                            color: '#fff'
                        }
                    });
                },
                success: function(data) {
                    setTimeout(function() {
                        $.unblockUI();
                        $('#activator').html(data);
                    }, 1000);
                }
            });
        });
    });
</script> </section>
