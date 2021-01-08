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
                <h3 class="card-title"><button class="btn btn-primary duzenlemeButton " value="1">Yeni Blok Yazısı Ekle</button></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Başlık</th>
                    <th>İçerik</th>
                    <th>Kategori</th>
                    <th>Tarih</th>
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

                    $sql = "SELECT b.*,COUNT(c.yorum) as yorum,bk.ad FROM blog b LEFT join blogyorum c ON c.blogId=b.ID join blogkat bk on b.kategori = bk.ID  GROUP BY b.ID";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($blogBas = $result->fetch_assoc()) {
                        echo  ' <tr> 
                        <td>'.$blogBas["baslik"]. '                                  </td>
                        <td>'.$blogBas["icerik"].'</td>
                        <td>'.$blogBas["ad"].'</td>
                        <td>'.$blogBas["tarih"].'</td> 
                        <td style="  width: 5%"> 
                        <div class="btn-group-vertical">
                        <button type="button" idd="'.$blogBas["ID"].'" class="btn btn-info duzenle">Düzenle</button> 
                        <button type="button" idd="'.$blogBas["ID"].'" class="btn btn-info blogSil">Sil</button>
                      </div> </td>  
                      <td  hidden >'.$blogBas["ID"].'</td> 
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
                <button id="duzenlemeButton" type="button" class="btn btn-tool btn-sm " data-card-widget="collapse" data-toggle="tooltip"
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
                    <label for="exampleInputEmail1">Başlık</label>
                    <input type="text" class="form-control" name="baslik" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">İçerik</label>
                    <textarea class="form-control" rows="3" name="icerik"></textarea>
                   </div>
                   <div class="row">
                    <div class="col-sm-9">
                      <!-- select -->
                      <div class="form-group">
                    <label for="exampleInputPassword1">Kategori</label>
                    <select id="kategori" name="kat" class="form-control">
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

                        $sql = "SELECT * from blogKat";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) { 
                          
                        while($blogBas = $result->fetch_assoc()) {
                            echo  ' <option value="'.$blogBas["ID"].'" valuee="'.$blogBas["ad"].'">'.$blogBas["ad"].'</option> ';
                        }
                        } else {
                        echo "Mesaj Yok";
                        }
                        $conn->close(); 

                        ?> 
                                                </select>                  </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Yeni Kategori Ekle</label>
                        <div class="input-group input-group-sm">
                          <input type="text" id="kategoriName" placeholder="Kategori Adı Girin" class="form-control">
                          <span class="input-group-append">
                            <button type="button" id="kategoriEkle" class="btn btn-info btn-flat">Ekle!</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                    
                <div class="form-group">
                    <label for="exampleInputPassword1">Tarih</label>
                    <input type="text" class="form-control" name="tarih">
                  </div>
                <!-- /.card-body -->

                </div>
                <div class="card-footer">
                  <button type="submit" name="blokDuzenle" id="blokDüzenlemesi" class="btn btn-primary">Düzenle</button>
                  <button type="submit" visible="hidden" name="blokEkle"  id="blokEklemesi" class="btn btn-primary">Ekle</button>

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