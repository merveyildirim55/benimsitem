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
              <li class="breadcrumb-item"><a href="#">Hakkımda</a></li> 
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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

    $sql = "SELECT * FROM hakkimda";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc()
    ?>
    <!-- Main content -->
    <section class="content">
    <div class="row"> 
          <div class="col-md-10 offset-1">
            
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Hakkımda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form class="" action="../islem.php" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-6">
                <div class="form-group">

                         <label>Başlık</label>
                        <input type="text" class="form-control" name="baslik" value="<?php echo $row["baslik"]; ?>">
                        </div> 

                  <div class="form-group">
                    <label class="col-form-label" for="inputWarning"><i class="far fa-laugh"></i> Ön Söz</label>
                    <input type="text" class="form-control is-warning" id="inputWarning" name="onSoz" value="<?php echo $row["onSoz"]; ?>">
                  </div> 
                      <div class="form-group">
                        <label>Resim</label> 
                        <input class="btn btn-block btn-outline-warning btn-lg"/ type="file" name="fileUp" />   
                      </div> 
                      <div class="form-group">
                        <label>Hakkımda</label>
                        <textarea class="form-control" rows="3" name="hakkimda"  ><?php echo $row["hakkimda"]; ?></textarea> 
                  </div>
                  </div>
                  <div class="col-6">
                <img src="../style/images/res/<?php echo $row["resim"]; ?>"  class="img-fluid mb-2" />
                <input type="hidden"  name="resim" value="<?php echo $row["resim"]; ?>"/>

                </div>
                
                  </div> 
                  <input type="submit" value="Gonder" name="hakkimdaKaydet"  class="btn btn-block btn-outline-warning btn-lg"/> 

                </form>
              </div>
              <!-- /.card-body -->
            </div>
            
            
            
            
          </div>
          
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php 

include 'footer.php';
}else         Header("Location:../kulLog.php?durum=hataa");
?>