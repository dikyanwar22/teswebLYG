<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb" style="padding-top: 2%;">
      <li><a href="#"><i class="fa fa-home"></i> <?= str_replace('_', ' ', $this->uri->segment(1)); ?></a></li>
      <?php if($this->uri->segment(2) != '') : ?>
      <li><a href="#"><?= str_replace('_', ' ', $this->uri->segment(2)); ?></a></li>
      <?php endif; ?>
      <?php if($this->uri->segment(3) != '') : ?>
      <li class="active"><?= str_replace('_', ' ', $this->uri->segment(3)); ?></li>
      <?php endif; ?>
    </ol>
  </section>
  <div style="margin-top: 5%;"></div>
