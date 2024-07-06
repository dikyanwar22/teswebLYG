<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <!-- <div style="margin-bottom: 35%;"></div> -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="https://cdn-icons-png.freepik.com/256/3135/3135715.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= $this->session->userdata('username'); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <span id="all_menu"></span>
  </section>
  <!-- /.sidebar -->
</aside>
