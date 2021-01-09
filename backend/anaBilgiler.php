<?php
session_start();
ob_start();
  if($_SESSION['durum'] == 'ok')
{ 

include 'header.php';

?>
 
  <div class="content-wrapper"> 
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
      </div>
    </section>
<?php   $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "merveyildirim";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM temelbilgiler";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc()
            ?>
    <!-- Main content -->
    <section class="content">
<div class="row">
<div class="offset-1 col-10">
    <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Temel Bilgiler</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form class="" action="../islem.php" method="post">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Site Başlığı</label>
                        <input type="text" name="sitaBasligi" class="form-control" value="<?php echo $row["sitaBasligi"]; ?>">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Site Açıklaması</label>
                        <input type="text" name="siteAciklamasi" class="form-control" value="<?php echo $row["siteAciklamasi"]; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">  İl </label>
                        <input type="text" name="il" class="form-control is-valid" id="inputSuccess" value="<?php echo $row["il"]; ?>">
                     </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">Telefon</label>
                        <input type="text" name="telefon" class="form-control is-valid" id="inputSuccess" value="<?php echo $row["telefon"]; ?>">
                     </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">Mail</label>
                        <input type="text" name="mail" class="form-control is-valid" id="inputSuccess" value="<?php echo $row["mail"]; ?>">
                     </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">  İnstagram </label>
                        <input type="text" name="ins" class="form-control is-valid" id="inputSuccess" value="<?php echo $row["ins"]; ?>">
                     </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">Twetter</label>
                        <input type="text" name="twet" class="form-control is-valid" id="inputSuccess" value="<?php echo $row["twet"]; ?>">
                     </div>
                    </div> 
                  </div>
                  <input type="submit" name="insertTemel" value='KAYDET'  class="btn btn-block btn-outline-success"> 
                </form>

                  
            </div>
</div></div>
    </section> 
  </div>
  <!-- /.content-wrapper -->



<?php 

include 'footer.php';

}else         Header("Location:../kulLog.php?durum=hataa");
?>