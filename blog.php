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
            $rows = $result->fetch_assoc()
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="style/images/favicon.png">
<title><?php echo $rows["sitaBasligi"]; ?></title>
<!-- Bootstrap core CSS -->
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/plugins.css" rel="stylesheet">
<link href="style/css/prettify.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="style/css/color/green.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,700,600,500,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
<link href="style/type/fontello.css" rel="stylesheet">
<link href="style/type/budicons.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="style/js/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <script>
      video {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: -100;
  background-size: cover;
}
</script>
</head>
<video autoplay loop muted style="backend-color:black ; opacity:0.1">
 <source src="style/video/seattleferryride.mp4" type="video/mp4">
</video>

<body class="full-layout" >
  
  <div class="container">
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>
<div class="body-wrapper">
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header"> <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
      <div class="navbar-brand text-center"> <a href="index.html"><img src="style/images/logo.png" alt="" data-src="style/images/logo.png" data-ret="style/images/logo@2x.png" class="retina" /></a> </div>
      <!-- /.navbar-brand --> 
    </div>
    <!-- /.navbar-header -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="./index.php" ><i class="budicon-home-1"></i><span>Ana Sayfa</span></a></li>
        <li><a href="./index.php#foto" ><i class="budicon-image"></i><span>Fotoğraflar</span></a></li>
        <li><a href="./index.php#hakkim"><i class="budicon-author"></i><span>Hakkımda</span></a></li>
        <li><a href="./index.php#ilet" ><i class="budicon-profile"></i><span>İleişim</span></a></li>
        <li class="current"><a href="./blog.php" class="hint--right" data-hint="Blog"><i class="budicon-book-1"></i><span>Blog</span></a></li>
        <li><a href="./index.php#elsewhere" class="hint--right fancybox-inline" data-hint="Elsewhere" data-fancybox-width="325" data-fancybox-height="220"><i class="icon-heart-empty-1"></i><span>Elsewhere</span></a></li>
      </ul>
      <!-- /.navbar-nav --> 
    </div>
    <!-- /.navbar-collapse -->
    <div id="elsewhere" style="display:none;">
      <h1>Sosyal</h1>
      <div class="divide20"></div>
      <ul class="social">
        <li><a href="#"> </a></li>
        <li><a href="#"> </a></li>
        <li><a target="_blank" href="<?php echo $rows["ins"]; ?>"><i class="icon-s-twitter"></i></a></li>   
        <li><a target="_blank" href="<?php echo $rows["twet"]; ?>"><i class="icon-s-instagram"></i></a></li> 
        <li><a href="#"> </a></li>
        <li><a href="#"> </a></li>
      </ul>
    </div>
    <!-- /#elsewhere --> 
  </nav>
  <!-- /.navbar -->
  
  <div class="container inner">
    <div class="blog list-view row">
      <div class="col-md-8 col-sm-12 content">
        <div class="blog-posts">
          
          
          
          
          
          
          
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
            if (isset($_GET['katID'])) {
              if ($_GET['katGetir']=="ok") {
                $katId = $_GET['katID']; 
                $sql = 'SELECT b.*,COUNT(c.yorum) as yorum,bk.ad FROM blog b LEFT join blogyorum c ON c.blogId=b.ID join blogkat bk on b.kategori = bk.ID where bk.ID='.$katId.'  GROUP BY b.ID  ORDER BY COUNT(c.yorum) DESC   ';
              }
             }
            else {
              $sql = "SELECT b.*,COUNT(c.yorum) as yorum,bk.ad FROM blog b LEFT join blogyorum c ON c.blogId=b.ID join blogkat bk on b.kategori = bk.ID  GROUP BY b.ID";
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while($blog = $result->fetch_assoc()) {
              $blocIcerik=substr($blog["icerik"], 0,350);
                echo  ' <div class="post box">              <div class="row">  

                <div class="col-sm-10 post-content"> 
                  <div class="meta"><div class="text-overlay"><a href="tumBlog.php?id='.$blog["ID"].'&blogOku=ok" class="btn">Tümünü Oku</a><span class="category">'.$blog["ad"].'</span><span class="date">'.$blog["tarih"].'</span><span class="comments"><span>'.$blog["yorum"].'<i class="icon-chat-1"></i></span></span></div>
                  <h2 class="post-title">'.$blog["baslik"].'</h2>
                  <p>'.$blocIcerik.'...</p>
                </div> 
              </div>           </div> </div>
              ';
            }
            } else {
            echo "Mesaj Yok";
            }
            $conn->close(); 

            ?>
                       
          
        </div>
        <!-- /.blog-posts -->
        
        
        <!-- /.pagination --> 
        
      </div>
      <!-- /.content -->
      
      <aside class="col-md-4 col-sm-12 sidebar">  
      
      <?php include 'blogLeftMen.php'; ?>

                 
        

<?php include 'footer.php'; ?>

 