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
            <h1>Ana Bilgiler</h1>
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

    <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                  Resimler
                </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="all"> All items </a>
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

                          $sql = "SELECT * FROM resimKat";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                              echo  ' 
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="'.$row["ID"].'"> '.$row["kategori"].' </a>
                              ';
                          }
                          } else {
                          echo "Mesaj Yok";
                          }
                          $conn->close(); 

                      ?>
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle=""> Karıştır </a>
                    
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row" style="padding: 3px; position: relative; width: 100%; display: flex; flex-wrap: wrap; height: 315px;">
                  

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

                          $sql = "SELECT r.ID as idd,r.*,a.* FROM resimkon r join resimKat a on r.resimKat=a.ID                          ";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                              echo  ' 
                              <div class="resimSilId'.$row["idd"].' filtr-item col-sm-2 filteredOut" data-category="'.$row["resimKat"].'" data-sort="'.$row["kategori"].'" style="opacity: 0; transform: scale(0.5) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; z-index: -1000; width: 160.4px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                              <a class="resimm" id="'.$row["idd"].'" href="../style/images/res/'.$row["Konum"].'" data-toggle="modal" data-target="#exampleModalCenter" data-title="'.$row["kategori"].'">
                                <img src="../style/images/res/'.$row["Konum"].'" class="img-fluid mb-2" alt="'.$row["kategori"].'">
                              </a>
                            </div> 
                               ';
                          }
                          } else {
                          echo "Kayıtlı Resim Yok";
                          }
                          $conn->close(); 

                      ?>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="row">
          <div class="col-md-10 offset-1">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Yeni Resim Ekle</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <form action="../kaydet.php" id="resimKaydetsene" method="post" enctype="multipart/form-data">  
                     
                      <!-- select -->
                      <div class="form-group">
                        <label>Kategori</label>
                        <select name="taskOption" class="form-control is-warning">
                        
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

                        $sql = "SELECT * FROM resimKat";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo  '                           <option value='.$row["ID"].'>'.$row["kategori"].'</option> ';
                        }
                        } else {
                        echo "Kayıtlı Resim Yok";
                        }
                        $conn->close(); 

                        ?> 
                        </select> 
                    </div>
                    <input class="btn btn-block bg-gradient-info"/ type="file" name="fileUp" />  
                    
                    <input type="submit" value="Gonder"  class="btn btn-block bg-gradient-info"/> 
                    </form>                
                </div>
              </div> 
            </div> 
          </div> 
        </div>
    </section> 
  </div>  
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Önizleme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body burayaGonderResimi">
        ...
      </div>
      <div class="modal-footer">
         <a type="button"  class="btn btn-primary resimSil">Sil</a>
      </div>
    </div>
  </div>
</div>
 
<?php 

include 'footer.php';
}else         Header("Location:../kulLog.php?durum=hataa");
?>