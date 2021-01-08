<?php include 'header.php'; ?>
  
  <section id="anaSayfa" >
    <div class="fullscreenbanner-container revolution">
      <div class="fullscreenbanner">
        <ul>
          <li data-transition="fade"> <img src="style/images/dummy.png"  alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="repeat">
            <h1 class="tp-caption caption large sfb" data-x="center" data-y="center" data-voffset="-25" data-speed="900" data-start="1000" data-endspeed="100" data-easing="Sine.easeOut"><?php echo $rows["sitaBasligi"]; ?></h1>
            <div class="tp-caption small tp-fade fadeout tp-resizeme" data-x="center" data-y="center" data-voffset="25" data-speed="100"
                data-start="1500"
                data-easing="Power4.easeOut"
                data-splitin="chars"
                data-splitout="chars"
                data-elementdelay="0.03"
                data-endelementdelay="0"
                data-endspeed="100"
                data-endeasing="Power1.easeOut"
                style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;"><?php echo $rows["siteAciklamasi"]; ?></div>
            <div class="arrow smooth"><a href="#portfolio"><i class="icon-down-open-big"></i></a></div>
          </li>
        </ul>
        <div class="tp-bannertimer"></div>
      </div>
      <!-- /.fullscreenbanner --> 
    </div>
    <!-- /.revolution --> 
  </section>
  <!-- /#home -->
  
  <div class="container">
    <section id="foto" class="portfolio">
      <div class="box">
        <h2 class="section-title pull-left">Fotoğraflarım</h2>
        <div id="filters-container" class="cbp-l-filters-alignRight pull-right">
          <div data-filter="*" class="cbp-filter-item-custom-active cbp-filter-item-custom btn">Hepsi</div>
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
    echo  '           <div data-filter=".'.$row["ID"].'" class="cbp-filter-item-custom btn">'.$row["kategori"].'</div>

     ';
}
} else {
echo "Mesaj Yok";
}
$conn->close(); 

?>
          
        </div>
        <!-- /#filters-container -->
        <div class="clearfix"></div>
        <div id="grid-container" class="cbp-l-grid-masonry">
          <ul>
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

$sql = "SELECT * FROM resimkon r join resimKat a on r.resimKat=a.ID                          ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo  '       
    <li class="cbp-item frame '.$row["ID"].'"> <a class="cbp-caption fancybox-media" data-rel="portfolio" href="style/images/res/'.$row["Konum"].'">
              <div class="cbp-caption-defaultWrap"> <img src="style/images/res/'.$row["Konum"].'" alt="" /> </div>
              <div class="cbp-caption-activeWrap">
                <div class="cbp-l-caption-alignCenter">
                  <div class="cbp-l-caption-body">
                    <div class="cbp-l-caption-title">Tam Ekran Görüntüle</div>
                  </div>
                </div>
              </div>
              </a> 
            </li> 

     ';
}
} else {
echo "Mesaj Yok";
}
$conn->close(); 

?>
            
                
          </ul>
        </div>
        <!-- /.cbp-l-grid-masonry --> 
 <div class="cbp-l-loadMore-button"> <a data-rel="portfolio"  href="style/images/res/1.jpg" class="cbp-l-loadMore-button-link btn cbp-caption fancybox-media">Tümünü Göster</a> </div>
     </div>
      <!-- /.box --> 
    </section>
    <!-- /#portfolio -->
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

    <section id="hakkim">
      <div class="box">
        <h2 class="section-title"><?php echo $row["baslik"]; ?></h2>
        <div class="row">
	      <div class="col-md-5 col-md-push-7 col-sm-12">
            <figure class="frame"><img src="style/images/res/<?php echo $row["resim"]; ?>" alt="" /></figure>
          </div>
          <!-- /column -->
          <div class="col-md-7 col-md-pull-5 col-sm-12">
            <p class="lead"><?php echo $row["onSoz"]; ?></p>
            <p> <?php echo $row["hakkimda"]; ?></p>
            </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="clearfix"></div>
        <div class="divide40"></div>
        <h2 class="section-title">Hobilerim</h2>
        <div class="divide10"></div>
        <div class="services-1">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="icon"> <i class="budicon-heart icn"></i> </div>
              <!-- /.icon -->
              <div class="text">
                <h5>Buraya Yazı</h5>
                <p>Buraya Yazı Buraya Yazı</p>
              </div>
              <!-- /.text --> 
            </div>
            <!-- /column -->
            <div class="col-md-4 col-sm-6">
              <div class="icon"> <i class="budicon-note-1 icn"></i> </div>
              <!-- /.icon -->
              <div class="text">
                <h5>Müzik Dinlemek</h5>
                <p>Buraya Yazı Buraya Yazı</p>
              </div>
              <!-- /.text --> 
            </div>
            <!-- /column -->
            <div class="col-md-4 col-sm-6">
              <div class="icon"> <i class="budicon-meal icn"></i> </div>
              <!-- /.icon -->
              <div class="text">
                <h5>Oturmak</h5>
                <p>Buraya Yazı Buraya Yazı</p>
              </div>
              <!-- /.text --> 
            </div>
            <!-- /column --> 
			<div class="divide30"></div>
            <div class="col-md-4 col-sm-6">
              <div class="icon"> <i class="budicon-bag icn"></i> </div>
              <!-- /.icon -->
              <div class="text">
                <h5>Buraya Yazı</h5>
                <p>Buraya Yazı Buraya Yazı</p>
              </div>
              <!-- /.text --> 
            </div>
            <!-- /column -->
            <div class="col-md-4 col-sm-6">
              <div class="icon"> <i class="budicon-diamond icn"></i> </div>
              <!-- /.icon -->
              <div class="text">
                <h5>Fıstık ve fındıkla ilgilenmek</h5>
                <p>Buraya Yazı Buraya Yazı</p>
              </div>
              <!-- /.text --> 
            </div>
            <!-- /column -->
            <div class="col-md-4 col-sm-6">
              <div class="icon"> <i class="budicon-cocktail icn"></i> </div>
              <!-- /.icon -->
              <div class="text">
                <h5>Film İzlemek</h5>
                <p>Buraya Yazı Buraya Yazı</p>
              </div>
              <!-- /.text --> 
            </div>
            <!-- /column --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.services --> 
        
      </div>
      <!-- /.box --> 
    </section>
    <!-- /#about -->
    <?php include 'footer.php'; ?>
