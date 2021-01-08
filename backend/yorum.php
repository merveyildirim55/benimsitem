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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"><button class="btn btn-primary duzenlemeButton " value="1">Yorumları İncele</button></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Gönderici Adı</th>
                    <th>Yorumu</th>
                    <th>Yorum Yaptıgı Blog</th>
                    <th>Mail Adresi</th>
                    <th>Yayın Durumu</th>
                    <th>Düzen</th>                     

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

                    $sql = "SELECT ba.*,b.ID bID,b.baslik baslik FROM blogyorum ba JOIN blog b on ba.blogId=b.ID                    ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($blogYor = $result->fetch_assoc()) {
                      $onayNedir = ($blogYor["onay"]=='1') ? ("checked") : ("check"); 
                      $onayNedirr = ($blogYor["onay"]=='1') ? ("1") : ("0");
                        echo  ' <tr> 
                        <td>'.$blogYor["ad"]. '                                  </td>
                        <td>'.$blogYor["yorum"].'</td>
                        <td>'.$blogYor["baslik"].'</td>
                        <td>'.$blogYor["mail"].'</td> 
                        <td><div class="custom-control custom-switch">
                        <input disabled '.$onayNedir.' vall="'.$onayNedirr.'" type="checkbox"class="custom-control-input" id="check'.$blogYor["ID"].'">
                        <label class="custom-control-label" for="check'.$blogYor["ID"].'"></label>
                      </div></td> 
                        <td style="  width: 5%"> 
                        <div class="btn-group-vertical">
                        <button type="button" idd="'.$blogYor["ID"].'" class="btn btn-info yorumOnay">Yayınla</button> 
                        <button type="button" idd="'.$blogYor["ID"].'" class="btn btn-info yorumSil">Sil</button>
                      </div> </td>   
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php 

include 'footer.php';
}else         Header("Location:../kulLog.php?durum=hataa");
?>