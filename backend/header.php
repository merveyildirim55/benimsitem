<?php 
        ob_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yönetim Paneli</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css"
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
  
  .alert {
    position: fixed;
    right: 0;
    bottom: 0; 
    width: auto;
    height: auto;
    z-index: 11111100;
    background-size: cover;
  }
  </style>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> 
    </ul>
  <?php
if(isset($_GET["durum"]))
{
  if($_GET["durum"]=="ok")
  {
   echo '<div class="alert alert-success alert-dismissible">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <h5><i class="icon fas fa-check"></i> Dikkat!</h5>
   Gerçekleştirilen işlem başarıyla tamamlandı. Bu bildiriyi kapata bilisiniz.
 </div>';
  }
}
?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
         
          <div class="dropdown-divider"></div>
          <div class="dropdown-item"> 
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "merveyildirim";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM mesajlar";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo  '<div class="media">
               <div class="media-body">
                <h3 class="dropdown-item-title"><strong>Adı:</strong>
                 '. $row["ad"].'
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <h4 class="text-sm"><strong>Konu:</strong>'. $row["konu"].'</h4>

                <p class="text-sm"><strong>Mesaj:</strong>'. $row["mesaj"].'</p>
                
                <p class="text-sm text-muted"><a href="../islem.php?mesajSil=ok&id='. $row["ID"].'  "><i class="far fa-trash-alt"></i></a> <strong> EPosta:</strong>'. $row["eposta"].'</p>
              </div>
            </div><hr />';
            }
            } else {
            echo "Mesaj Yok";
            }
            $conn->close(); 
 
            ?>
           
            <!-- Message End -->
        </div>
         
      </li>
      <!-- Notifications Dropdown Menu -->
       
      <li class="nav-item">
        <a class="nav-link" href="../islem.php?cikis=ok"   role="button">
          <i class="fas fa-times"></i>
        </a>
      </li> 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
    <?php 
          if (isset($_SESSION["yonetici"])) {
            if ($_SESSION["yonetici"]=='ok') {
      echo' <img src="dist/img/user1-128x128.jpg"
            class="brand-image img-circle elevation-3"
           style="opacity: .8">';}} ?>  
      <span class="brand-text font-weight-light"> <?php 
          if (isset($_SESSION["ad"])) {
       echo $_SESSION["ad"];
        } ?>  
          </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php 
          if (isset($_SESSION["temel"])|| isset($_SESSION["yonetici"])) {
        if($_SESSION['temel'] == '1'|| $_SESSION['yonetici'] == 'ok')
        {  
         echo '
          <li class="nav-item">
            <a href="anaBilgiler.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Temel Bilgiler
              </p>
            </a>
          </li>';
        }}?> <?php 
          if (isset($_SESSION["resim"])|| isset($_SESSION["yonetici"])) {
        if($_SESSION['resim'] == '1'|| $_SESSION['yonetici'] == 'ok')
        {  
         echo '
          <li class="nav-item">
            <a href="resimler.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Resimler
              </p>
            </a>
          </li> ';
        }}?> <?php 
          if (isset($_SESSION["yorum"])|| isset($_SESSION["yonetici"])) {
        if($_SESSION['yorum'] == '1'|| $_SESSION['yonetici'] == 'ok')
        {  
         echo '
          <li class="nav-item">
            <a href="yorum.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Yorumlar
              </p>
            </a>
          </li> ';
        }}?> <?php 
          if (isset($_SESSION["hakkimda"])|| isset($_SESSION["yonetici"])) {
        if($_SESSION['hakkimda'] == '1'|| $_SESSION['yonetici'] == 'ok')
        {  
         echo '
          <li class="nav-item">
            <a href="hakkimda.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Hakkımda
              </p>
            </a>
          </li>';
        }}?>  
           <?php 
          if (isset($_SESSION["blog"])|| isset($_SESSION["yonetici"])) {
        if($_SESSION['blog'] == '1'|| $_SESSION['yonetici'] == 'ok')
        {  
         echo '
          <li class="nav-item">
            <a href="blog.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Bloglar
              </p>
            </a>
          </li>';
        }}?>
           <?php 
         if (isset($_SESSION["kullanici"]) || isset($_SESSION["yonetici"])) {
        if($_SESSION['kullanici'] == '1'|| $_SESSION['yonetici'] == 'ok')
        {  
         echo ' <li class="nav-item">
            <a href="kullanicilarYetki.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Kullanıcı Yetki
              </p>
            </a>
          </li>';}} 
          ?>
          <?php 
         if (isset($_SESSION["yonetici"])) {
        if($_SESSION['yonetici'] == 'ok')
        {  
          echo ' <li class="nav-item">
            <a href="kullaniciLis.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Kullanıcı Liste
              </p>
            </a>
          </li>';
        }}
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>