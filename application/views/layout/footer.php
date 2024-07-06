</div><!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.3.0
  </div>
  <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript::;">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <i class="menu-icon fa fa-user bg-yellow"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
              <p>New phone +1(800)555-1234</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
              <p>nora@example.com</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <i class="menu-icon fa fa-file-code-o bg-green"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
              <p>Execution time 5 seconds</p>
            </div>
          </a>
        </li>
      </ul><!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="label label-danger pull-right">70%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              Update Resume
              <span class="label label-success pull-right">95%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-success" style="width: 95%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              Laravel Integration
              <span class="label label-warning pull-right">50%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              Back End Framework
              <span class="label label-primary pull-right">68%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
            </div>
          </a>
        </li>
      </ul><!-- /.control-sidebar-menu -->

    </div><!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>
        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>
          <p>
            Some information about this general settings option
          </p>
        </div><!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Allow mail redirect
            <input type="checkbox" class="pull-right" checked>
          </label>
          <p>
            Other sets of options are available
          </p>
        </div><!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Expose author name in posts
            <input type="checkbox" class="pull-right" checked>
          </label>
          <p>
            Allow the user to show his name in blog posts
          </p>
        </div><!-- /.form-group -->

        <h3 class="control-sidebar-heading">Chat Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Show me as online
            <input type="checkbox" class="pull-right" checked>
          </label>
        </div><!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Turn off notifications
            <input type="checkbox" class="pull-right">
          </label>
        </div><!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Delete chat history
            <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
          </label>
        </div><!-- /.form-group -->
      </form>
    </div><!-- /.tab-pane -->
  </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- charbox -->
<div class="chat_box">
  <div class="chat_head">
    <img src="<?= base_url('assets/css-modul/images/bell.png'); ?>" align="right" style="width:25px;height:25px;margin-bottom: -20px;margin-right: 8px;" border="0">
    <span class="label label-default" style="border-radius: 50px;width: 10px;text-align: center;background-color: #FF0000; color:white; margin-left: 264px;margin-bottom: 5px;" id="total_help"></span>
  </div>
  <div class="searchBox" style="display: none;">
    <div class="searchBox-inner" align="center" style="border-right: 1px solid #d0d0d0;border-left: 1px solid #d0d0d0;border-top: 1px solid #d0d0d0;">
      <input type="text" id="myInput1" class="span3" style="margin-top: 6px;width: 90%;" onkeyup="myFunction1()" placeholder="Search Support...">
    </div>
  </div>
  <div class="chat_body" style="display: none;">
    <div class="member_list" style="background: white;border: 1px solid #d0d0d0;">
      <!-- untuk menampilkan data helpdesk -->
      <span id="tampil_helpdesk"></span>
      <!-- untuk menampilkan data helpdesk -->
    </div>
  </div>
</div>
<!-- chatbox -->

<!-- jQuery 2.1.4 -->
<!-- <script src="<?= base_url('assets/adminLTE/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script> -->

<!-- Bootstrap 3.3.5 -->
<script src="<?= base_url('assets/adminLTE/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/adminLTE/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/adminLTE/plugins/fastclick/fastclick.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminLTE/dist/js/app.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/adminLTE/dist/js/demo.js'); ?>"></script>

<!-- chatbox -->
<script type="text/javascript">
  total_helpdesk();

  function total_helpdesk() {
    $.ajax({
      url: '<?= site_url('Help_Desk/Dashboard/total_helpdesk'); ?>',
      method: 'GET',
      dataType: 'JSON',
      success: function(response) {
        var total = response.total;
        $('#total_help').text(total);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  }

  show_helpdesk();

  function show_helpdesk() {
    $.ajax({
      url: '<?= site_url('Help_Desk/Dashboard/helpdesk_in'); ?>',
      method: 'GET',
      dataType: 'JSON',
      success: function(response) {
        var hitung = Object.keys(response).length;

        var elemenHTML = '<ul class="list-unstyled" id="style-5">';
        for (var i = 0; i < hitung; i++) {
          elemenHTML += '<li class="left clearfix" style="padding: 10px 10px;border-bottom: 1px solid #d0d0d0;">';
          elemenHTML += '<a href="' + response[i].url + '" target="_blank">';
          elemenHTML += '<div class="pull-left">';
          elemenHTML += '<img src="' + response[i].image + '" class="img-circle" alt="User Image" style="margin: auto 10px auto auto;width: 40px;height: 40px;">';
          elemenHTML += '</div>';
          elemenHTML += '<h4 style="padding: 0;margin: 0 0 0 45px;color: #444444;font-size: 15px;position: relative;"> ' + response[i].name + '<small style="color: #999999;font-size: 10px;position: absolute;top: 0;right: 0;"><i class="fa fa-clock-o"></i> ' + response[i].waktu + '</small>';
          elemenHTML += '</h4>';
          elemenHTML += '<p style="margin: 0 0 0 45px;font-size: 12px;color: #888888;">' + response[i].helpdesk + '</p>';
          elemenHTML += '</a>';
          elemenHTML += '</li>';
        }
        elemenHTML += '</ul>';
        $('#tampil_helpdesk').append(elemenHTML);

      }
    });
  }

  function myFunction1() {
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput1');
    filter = input.value.toUpperCase();
    ul = document.getElementById("style-5");
    li = ul.getElementsByTagName('li');
    for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("a")[0];
      if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
</script>

<script type="text/javascript">
  $('.chat_head').click(function() {
    $('.chat_body').slideToggle('slow');
    $('.searchBox').slideToggle('slow');
    $('.msg_box').hide('slow');
  });

  $('.msg_head').click(function() {
    $('.msg_wrap').slideToggle('slow');
  });

  $('.msg_box').hide();
  $('.chat_body').hide();
  $('.searchBox').hide();
</script>
<!-- chatbox -->

<!-- custom bentuk modul disini -->
<script type="text/javascript">

  // Panggil fungsi setelah dokumen selesai dimuat
  $(document).ready(function() {
    // Panggil fungsi untuk memuat menu
    loadMenu();
  });

  // Fungsi untuk memuat menu
  function loadMenu() {
    $.ajax({
      url: '<?= site_url('Menu/menu_didalam_menu'); ?>',
      method: 'GET',
      dataType: 'JSON',
      success: function(response) {
        // var total_menu_tunggal = Object.keys(response['menu_tunggal']).length;
        var total_menu_tunggal = response['menu_tunggal'] ? Object.keys(response['menu_tunggal']).length : '';
        // var total_menu = Object.keys(response['sub_menu']).length;
        var total_menu = response['sub_menu'] ? Object.keys(response['sub_menu']).length : '';
        var v_html = '<ul class="sidebar-menu">';
        v_html += '<p></p>';

        for (var x = 0; x < total_menu_tunggal; x++) {
          var link = '<?= $this->uri->segment(2); ?>';
          var active_link = link == response['menu_tunggal'][x].class ? 'active' : '';
          var url = 'Navigation'+ '/' + response['menu_tunggal'][x].class;

          v_html += '<li class="' + active_link + '">';
          v_html += '<a class="nav-link" href="<?= site_url(); ?>' + url + '">';
          v_html += '<i class="' + response['menu_tunggal'][x].icon + '"></i>';
          v_html += '<span>&nbsp;&nbsp;' + response['menu_tunggal'][x].menu + '</span>';
          v_html += '</a>';
          v_html += '</li>';
        }

        for (var i = 0; i < total_menu; i++) {
          // Panggil fungsi untuk memuat submenu di dalam loop
          v_html += loadSubMenu(response['sub_menu'][i]);
        }
        v_html += '</ul>';

        // Tambahkan HTML ke elemen dengan id 'all_menu'
        $('#all_menu').append(v_html);
      },
      error: function(error) {
        console.log('Error:', error);
      }
    });
  }

  // Fungsi untuk memuat submenu
  function loadSubMenu(menuItem) {
    var submenuHTML = '';

    var link_dropdown = '<?= $this->uri->segment(2); ?>';
    var itemClass = menuItem.class == link_dropdown ? 'active' : '';

    submenuHTML += '<li class="treeview ' + itemClass + '">';
    submenuHTML += '<a href="#">';
    submenuHTML += '<i class="' + menuItem.icon + '"></i> <span>' + menuItem.menu + '</span>';
    submenuHTML += '<i class="fa fa-angle-left pull-right"></i>';
    submenuHTML += '</a>';
    submenuHTML += '<ul class="treeview-menu">';

    // Memuat submenu dengan menggunakan async/await untuk menangani AJAX bersarang
    $.ajax({
      url: '<?= site_url('Menu/sub_menu'); ?>',
      method: 'POST',
      dataType: 'JSON',
      data: {
        menu_id: menuItem.id
      },
      async: false, // Menggunakan async: false untuk menangani AJAX bersarang
      success: function(response_data) {
        var total = Object.keys(response_data).length;
        for (var x = 0; x < total; x++) {
          submenuHTML += generateSubMenuHTML(response_data[x], menuItem);
        }
      },
      error: function(error) {
        console.log('Error:', error);
      }
    });

    submenuHTML += '</ul>';
    submenuHTML += '</li>';

    return submenuHTML;
  }

  // Fungsi untuk menghasilkan HTML untuk submenu
  function generateSubMenuHTML(subMenuItem, menuItem) {
    var link_sub = '<?= $this->uri->segment(3); ?>';
    var active_link_sub = link_sub == subMenuItem.uri_sub ? 'green' : '';
    var sizeText = link_sub == subMenuItem.uri_sub ? 'font-weight: bold' : '';

    var count_notif = subMenuItem.total;
    var total_notif = count_notif > 0 ? '(' + count_notif + ')' : '';

    var url = 'Navigation' + '/' + subMenuItem.class + '/' + subMenuItem.function;

    var submenuHTML = '';
    submenuHTML += '<li style="margin-left: 2%;">';
    submenuHTML += '<a style="color: '+active_link_sub+'; '+sizeText+'" href="<?= site_url(); ?>' + url + '"><i class="' + subMenuItem.icon_sub + '"></i>&nbsp;&nbsp;' + subMenuItem.sub_menu + ' ' + total_notif + '</a>';
    submenuHTML += '</li>';

    return submenuHTML;
  }
</script>
</body>

</html>
