<?php
session_start();
ob_start();
  if($_SESSION['durum'] == 'ok')
{ 

include 'header.php';
 
 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ana Sayfa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li> 
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
 HOŞGGELDİN
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php 

include 'footer.php';
}else         Header("Location:../kulLog.php?durum=hataa");
?>