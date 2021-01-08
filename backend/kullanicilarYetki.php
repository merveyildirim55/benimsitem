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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">hakkimda</a></li> 
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> 
    <section class="content-header">
    <div class="row"> 


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

            $sql = "SELECT k.*,k.ID as kID,y.*,y.ID as yID FROM kullanici k JOIN yetki y on k.yetki=y.ID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {            $sayac =0;

            // output data of each row
            while($kullaniciBilgi = $result->fetch_assoc()) {
              $temel=($kullaniciBilgi["temel"]==1)?("checked"):("check");
              $resim=($kullaniciBilgi["resim"]==1)?("checked"):("check");
              $hakkimda=($kullaniciBilgi["hakkimda"]==1)?("checked"):("check");
              $yorum=($kullaniciBilgi["yorum"]==1)?("checked"):("check");
              $kullanici=($kullaniciBilgi["kullanici"]==1)?("checked"):("check");
              $blog=($kullaniciBilgi["blog"]==1)?("checked"):("check");
              if($sayac!=0)
              {
                echo  '<div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user kullanicim">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-info">
                    <h3 class="widget-user-username">'.$kullaniciBilgi["ad"].'</h3>
                   </div>   
                  <div class="text-center" st>
                     <small>Yetkiler</small> 
                  </div> 
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">TEMEL BİLGİLER</h5>
                          <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox"'.$temel.'  idd="'.$kullaniciBilgi["temel"].'"   class="custom-control-input temel checkbox"  id="temel'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'">
                          <label class="custom-control-label" for="temel'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'"></label>
                        </div>
                      </div>                    </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">RESİMLER</h5>
                          <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" '. $resim.'  idd="'.$kullaniciBilgi["resim"].'"  class="custom-control-input checkbox" id="resim'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'">
                          <label class="custom-control-label" for="resim'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'"></label>
                        </div>
                      </div>                    </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">YORUMLAR</h5>
                          <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" idd="'.$kullaniciBilgi["yorum"].'"  '.$yorum.'    class="custom-control-input checkbox" id="yorum'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'">
                          <label class="custom-control-label" for="yorum'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'"></label>
                        </div>
                      </div>                    </div>
                        <!-- /.description-block -->
                      </div> 
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">HAKKIMDA</h5>
                          <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" '.$hakkimda.'  idd="'.$kullaniciBilgi["hakkimda"].'"  class="custom-control-input checkbox" id="hakkimda'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'">
                          <label class="custom-control-label" for="hakkimda'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'"></label>
                        </div>
                      </div>                    </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">KULLANICILAR</h5>
                          <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" '.$kullanici.' idd="'.$kullaniciBilgi["kullanici"].'"   class="custom-control-input checkbox" id="kullanici'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'">
                          <label class="custom-control-label" for="kullanici'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'"></label>
                        </div>
                      </div>                    </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">BLOKLAR</h5>
                          <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" '.$blog.' idd="'.$kullaniciBilgi["blog"].'" class="custom-control-input checkbox"   id="blog'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'">
                          <label class="custom-control-label" for="blog'.$kullaniciBilgi["kID"]."".$kullaniciBilgi["ad"].'"></label>
                        </div>
                      </div>                    </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div> <div class="row">
                    <div class="col-4 offset-4 btn-group btn-group-toggle text-center content-center justify-content-center" data-toggle="buttons">
                
                      <label class="btn btn-secondary active"> 
                        <input type="radio" idd='.$kullaniciBilgi["yID"].' id="option1" autocomplete="off" class="yetkiDuzenle"> Güncelle
                      </label> 
                      
                    </div>
                      <!-- /.col -->
                    
                   ';

                   
             echo'    </div> </div>
                <!-- /.widget-user -->
              </div>';
            }                         $sayac++;
          }        
            } else {
            echo "Mesaj Yok";
            }
            $conn->close(); 
            echo'  </div>';
            ?>
          <!-- ------------------------------------------------------- -->
          
          <!--------------------------------------------------------- -->
           
          <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php 

include 'footer.php';
}else         Header("Location:../kulLog.php?durum=hataa");
?>