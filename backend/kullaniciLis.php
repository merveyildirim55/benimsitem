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
            <h1>Bloglar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bloglar</a></li> 
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"><button class="btn btn-primary KulduzenlemeButton " value="1">Yeni Kullanıcı Ekle</button></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Ad</th>
                    <th>Soru</th>
                    <th>Cevap</th>
                    <th>Düzen</th>                      <th  hidden ></th> 

                  </tr>
                  </thead>
                  <tbody>
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

                    $sql = "SELECT * from kullanici";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($kullaniciLis = $result->fetch_assoc()) {
                        echo  ' <tr> 
                        <td>'.$kullaniciLis["ad"]. '</td>
                        <td>'.$kullaniciLis["soru"].'</td>
                        <td>'.$kullaniciLis["cevap"].'</td> 
                        <td style="  width: 5%"> 
                        <div class="btn-group-vertical">
                        <button type="button" idd="'.$kullaniciLis["ID"].'" class="btn btn-info duzenleKul">Düzenle</button> 
                        <a type="button" href="../islem.php?kulSil='.$kullaniciLis["ID"].'" class="btn btn-info kulSil">Sil</a>
                      </div> </td>  
                      <td  hidden >'.$kullaniciLis["ID"].'</td> 
                      </tr> ';
                    }
                    } else {
                    echo "Mesaj Yok";
                    }
                    $conn->close(); 

                    ?>
                 
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
          
        </div>
        
      </div> 
    </section>

      <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-md-10 offset-1">
          <div class="card card-outline card-info collapsed-card">
            <div class="card-header">
              <div class="callout callout-warning düzenlemeUyarisiDiv" style="display:none">
                  <h5>DİKKAT!</h5> 
                  <p class="düzenlemeUyarisi"></p>
                </div>
              <h3 class="card-title">
              <p>  Düzenleme Bölümü </p>
                <small> Lütfen Yukarıdaki Tablodan Bir Blog Seçiniz Veya Ekle Butanuna  </small>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button id="KulduzenlemeButton" type="button" class="btn btn-tool btn-sm " data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-plus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body   " style="display:none">
              <div class="mb-3">
              <form class="" action="../islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ADI</label>
                    <input type="text" class="form-control" name="ad" >
                  </div>
                  <div class="form-group" id="kulSif" style="diplay:none">
                    <label  for="exampleInputPassword1">Şifre</label>
                    <input  type="text" class="form-control" name="sifre">
                   </div>
                  <div class="form-group">
                    <label  for="exampleInputPassword1">SORUSU</label>
                    <input  type="text" class="form-control" name="soru">
                   </div>
                  
                    
                <div class="form-group">
                    <label for="exampleInputPassword1">Cevap</label>
                    <input type="text" class="form-control" name="cevap">
                  </div>
                <!-- /.card-body -->
    
                <div class="form-group" style="display:none">
                     <input type="text" class="form-control" name="IDD">
                </div>
                </div> <div class="row">
                    <div class="col-sm-9"> 
                <div class="card-footer">
                  <button type="submit" name="kulDüzenlemesi" id="kulDüzenlemesi" class="btn btn-primary">Düzenle</button>
                  <button type="submit" visible="hidden" name="kulEkle"  id="blokEklemesi" class="btn btn-primary">Ekle</button>

                </div>
              </form>
              </div>
               
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div> 



<?php 

include 'footer.php';
}else         Header("Location:../kulLog.php?durum=hataa");
?>