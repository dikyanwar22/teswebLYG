<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?= base_url('assets/adminLTE/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminLTE/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets/adminLTE/dist/css/skins/_all-skins.min.css'); ?>">

  <!-- jQuery -->
  <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>

  <!-- ChatBox -->
  <style type="text/css">
    .chat_box {
      z-index: 9999;
      position: fixed;
      right: 20px;
      bottom: 0px;
      width: 300px;
    }

    .chat_head,
    .msg_head {
      background: #00008B;
      /*biru tua */
      color: white;
      padding: 10px;
      font-weight: bold;
      cursor: pointer;
      border-radius: 5px 5px 0px 0px;
    }

    .searchBox {
      padding: 0 !important;
      margin: 0 !important;
      height: 40px;
      width: 100%;
    }

    .searchBox-inner {
      height: 100%;
      width: 100%;
      padding: 0px !important;
      background-color: #eee;
    }

    .chat_body {
      background: whitesmoke;
      height: 300px;
    }

    .member_list {
      height: 300px;
      overflow-x: hidden;
      overflow-y: auto;
    }

    .msg_box {
      position: fixed;
      bottom: -5px;
      width: 300px;
      height: 305px;
      background: white;
      border-radius: 5px 5px 0px 0px;
    }

    .pull-left {
      float: left !important;
    }

    .img-circle {
      border-radius: 50%;
    }
  </style>
  <!-- ChatBox -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
