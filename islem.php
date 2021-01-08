<?php
session_start();
ob_start();

include 'baglan.php';

if (isset($_POST['selectKullanici'])) {


  if ($_POST) { 
     $icerik = md5($_POST['sifre']);  

     if ($icerik<>"") { 
      
      $baglantii = new PDO("mysql:host=localhost;dbname=merveyildirim", "root", "");
      $baglantii->exec("SET NAMES utf8");
      $baglantii->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      $sorgu = $baglantii->query("SELECT * FROM kullanici where  sifre='$icerik' and ad='MERVEYILDIRIM' ");
  
      $cikti = $sorgu->fetch(PDO::FETCH_ASSOC);
  
      $yetkiID =  $cikti["ad"];   
    if (isset($cikti["ad"]) ) {
        $_SESSION['durum']='ok';
        $_SESSION['yonetici']='ok';
        $_SESSION['ad']=$cikti['ad']; 
        $_SESSION['temel']='1';
        $_SESSION['resim']='1';
        $_SESSION['hakkimda']='1';
        $_SESSION['kullanici']='1';
        $_SESSION['blog']='1';
        $_SESSION['yorum']='1';
        $_SESSION['ad']=$cikti['ad'];
        if (isset( $_SESSION['durum']))
        {Header("Location:backend/index.php?durum=ok");exit;}else{ Header("Location:login.php?durum=sifre");}
      }
      else  { Header("Location:login.php?durum=sifre");
      } 
  
     }
  
  }  

}  

  if (isset($_POST['digerGiris'])) {


    if ($_POST) { 
       $icerik = md5($_POST['sifre']); 
       $ad = $_POST['ad']; 
  
       if ($icerik<>"") { 
        
        $baglantii = new PDO("mysql:host=localhost;dbname=merveyildirim", "root", "");
        $baglantii->exec("SET NAMES utf8");
        $baglantii->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sorgu = $baglantii->query("SELECT * FROM kullanici k join yetki y on k.yetki=y.ID where   sifre='$icerik' and ad='$ad' ");
    
        $cikti = $sorgu->fetch(PDO::FETCH_ASSOC);
        $_SESSION['temel']=$cikti['temel'];
        $_SESSION['resim']=$cikti['resim'];
        $_SESSION['hakkimda']=$cikti['hakkimda'];
        $_SESSION['kullanici']=$cikti['kullanici'];
        $_SESSION['blog']=$cikti['blog'];
        $_SESSION['yorum']=$cikti['yorum'];
        $_SESSION['ad']=$cikti['ad']; 
        if($cikti['yetki']=='1')
        {
          $_SESSION['yonetici']='ok';

        }
        else {
          $_SESSION['yonetici']='red';
        }

      if (isset($cikti["ad"]) ) {
          $_SESSION['durum']='ok'; 
         
          if (isset( $_SESSION['durum']))
          {Header("Location:backend/index.php?durum=ok");exit;}else{ Header("Location:kulLog.php?durum=hata");}
        }
        else  { Header("Location:kulLog.php?durum=hata");
        } 
    
       }
    
    }  
  
  } 
else if (isset($_POST['hakkimdaKaydet'])) 
{ 
  if($_FILES["fileUp"]["name"] != "")
  {
    
    $kaynak = $_FILES["fileUp"]["tmp_name"]; // tempdeki adı

    $ad = md5(uniqid()).$_FILES["fileUp"]["name"]; // dosya adı

    $tip = $_FILES["fileUp"]["type"]; // dosya tipi

    $boyut = $_FILES["fileUp"]["size"]; // boyutu
 echo  "asdasd";

    $kaydet = move_uploaded_file($kaynak,"style/images/res/".$ad); // resmimizi klasöre kayıt ettiriyoruz.

}
else
{
  $ad=$_POST['resim']; 
} 
  $baslik = $_POST['baslik']; 
  $onSoz = $_POST['onSoz']; 
  $hakkimda = $_POST['hakkimda']; 

  if ($baglanti->query("UPDATE hakkimda SET baslik='$baslik',onSoz='$onSoz',hakkimda='$hakkimda',resim='$ad' where ID=1")) 
      {               Header("Location:backend/hakkimda.php?durum=ok");

    } 
else {  Header("Location:backend/hakkimda.php?durum=hata");}
}
 

else if (isset($_POST['insertMesaj'])) 
{
  if ($_POST) 
  { 
  
     $ad = $_POST['ad']; 
     $konu = $_POST['konu']; 
     $mesaj = $_POST['mesaj']; 
     $eposta = $_POST['eposta'];  
    
     if ($ad<>""&&$konu<>""&&$mesaj<>""&&$eposta<>"") 
     {   
      if ($baglanti->query("INSERT INTO mesajlar (ad,konu,mesaj,eposta) VALUES ('$ad','$konu','$mesaj','$eposta')")) 
      {
        Header("Location:index.php?durum=ok");
        exit;
      }
             
    } 
    else
      {
        Header("Location:index.php?durum=hata");
    exit;
      } 
 }  
}

else if (isset($_POST['insertYorum'])) 
{
  if ($_POST) 
  { 
  
     $ad = $_POST['ad']; 
     $mail = $_POST['mail']; 
     $blogId = $_POST['blogId']; 
     $yorum = $_POST['yorum'];  
    
     if ($ad<>""&&$mail<>""&&$blogId<>""&&$yorum<>"") 
     {   
      if ($baglanti->query("INSERT INTO blogyorum (ad,mail,blogId,yorum) VALUES ('$ad','$mail','$blogId','$yorum')")) 
      {
        Header("Location:tumBlog.php?id=".$blogId."&blogOku=ok");
        exit;
      }
             
    } 
    else
      {
        Header("Location:index.php?durum=hata");
    exit;
      } 
 }  
}
else if (isset($_POST['insertTemel'])) 
{
  if ($_POST) 
  { 
    
     $sitaBasligi = $_POST['sitaBasligi']; 
     $siteAciklamasi = $_POST['siteAciklamasi']; 
     $il = $_POST['il']; 
     $telefon = $_POST['telefon'];  
     $mail = $_POST['mail']; 
     $ins = $_POST['ins']; 
     $twet = $_POST['twet']; 
    
       if ($baglanti->query("UPDATE temelbilgiler SET sitaBasligi='$sitaBasligi',siteAciklamasi='$siteAciklamasi',il='$il',telefon='$telefon',mail='$mail',twet='$twet',ins='$ins' where ID=1")) 
      {
        Header("Location:backend/anaBilgiler.php?durum=ok");
        exit;
      } 
      else
  {
    Header("Location:backend/anaBilgiler.php?durum=hata");
exit;
  }  

}

}



else if (isset($_POST['blokEkle'])) 
{
  if ($_POST) 
  { 
     $tarih = $_POST['tarih']; 
     $baslik = $_POST['baslik']; 
     $icerik = $_POST['icerik']; 
     $kategori = $_POST['kat'];     

     if ($baglanti->query("INSERT INTO blog (baslik,tarih,icerik,kategori) VALUES ('$baslik','$tarih','$icerik','$kategori')")) 
      {
        Header("Location:backend/blog.php?durum=ok");
        exit;
      } else
      {
        Header("Location:backend/blog.php?durum=hata");
    exit;
      }

}}





else if (isset($_POST['kategoriEkle'])) 
{
  if ($_POST) 
  { 
     $adi = $_POST['adi'];      

     if ($baglanti->query("INSERT INTO blogKat (ad) VALUES ('$adi')")) 
      {
        echo $baglanti->insert_id; 
      } else
      {
        Header("Location:backend/blog.php?durum=hata");
    exit;
      }

}}
else if (isset($_POST['yorumOnay'])) 
{
  if ($_POST) 
  { 
     $adi = $_POST['adi'];      
     $adii = $_POST['adii'];      
     $ters = ($adii=='1') ? ("0") : ("1"); 

     if ($baglanti->query("UPDATE blogyorum SET onay=$ters where ID=$adi")) 
      {
        echo $adi; 
      } else
      {
        echo $adi; 
       }

}} 

else if (isset($_POST['yetkiDuz'])) 
{
  if ($_POST) 
  { 
    
    $temel=$_POST['temel'];
    $resim=$_POST['resim'];
    $hakkimda=$_POST['hakkimda'];
    $kullanici=$_POST['kullanici'];
    $blog=$_POST['blog'];
    $yorum=$_POST['yorum'];
    $kID=$_POST['yID'];


 

     if ($baglanti->query("UPDATE yetki SET temel=$temel ,resim=$resim,hakkimda=$hakkimda,kullanici=$kullanici,blog=$blog,yorum=$yorum where ID=$kID")) 
      {
        echo $adi; 
      } else
      {
        echo $adi; 
       }

}} 
else if (isset($_POST['blokDuzenle'])) 
{
  if ($_POST) 
  { 
     $tarih = $_POST['tarih']; 
     $baslik = $_POST['baslik']; 
     $icerik = $_POST['icerik']; 
     $kategori = $_POST['kat'];  
     $ID = $_POST['blokDuzenle'];  
    
       if ($baglanti->query("UPDATE blog SET tarih='$tarih',baslik='$baslik',icerik='$icerik',kategori='$kategori' where ID=$ID")) 
      {
        Header("Location:backend/blog.php?durum=ok");
        exit;
      } else
      {
        Header("Location:backend/blog.php?durum=hata");
    exit;
      }

} 
}

else if (isset($_POST['kulDüzenlemesi'])) 
{
  if ($_POST) 
  { 
     $ad = $_POST['ad']; 
     $soru = $_POST['soru']; 
     $cevap = $_POST['cevap'];  
     $ID = $_POST['IDD'];  
    echo $ID;
       if ($baglanti->query("UPDATE kullanici SET ad='$ad',soru='$soru',cevap='$cevap' where ID=$ID")) 
      {
        Header("Location:backend/kullaniciLis.php?durum=ok");
        exit;
      }  
     else 
      {
        Header("Location:backend/kullaniciLis.php?durum=hata");
        exit;
      } 

} 
}

else if (isset($_POST['kulEkle'])) 
{
  if ($_POST) 
  { 
    $ad = $_POST['ad']; 
    $soru = $_POST['soru']; 
    $cevap = $_POST['cevap'];  
    $sifre = $_POST['sifre'];   
    $sifrem = md5($sifre);
                 ## YetkiKaydı
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "merveyildirim";
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->query("SET NAMES 'utf8'");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                  }
                catch(PDOException $e)
                  {
                    echo "Bağlantı Hatası: " . $e->getMessage();
                  }
                   
                $sql = "INSERT INTO yetki( temel, resim, yorum, hakkimda, kullanici, blog, kulEkle) VALUES (0,0,0,0,0,0,0)";
                $conn->exec($sql);
                $son_id = $conn->lastInsertId();
       

     if ($baglanti->query("INSERT INTO kullanici (ad,soru,cevap,sifre,yetki) VALUES ('$ad','$soru','$cevap','$sifrem',$son_id)")) 
     {
      Header("Location:backend/kullaniciLis.php?durum=ok");
      exit;
    }    
}}



else if (isset($_GET['mesajSil'])) {
  if ($_GET['mesajSil']=="ok") {
    $id = $_GET['id']; 
    if ($baglanti->query("DELETE FROM mesajlar WHERE ID =".$id)) 
    {
      Header("Location:backend/index.php?durum=ok");
      exit;
    } 
  else
    {
      Header("Location:backend/index.php?durum=hata");
  exit;
    }  
  }
}  

else if (isset($_GET['resimSil'])) { 
  $id =$_GET['resimSil']; 
  if ($baglanti->query("DELETE FROM resimKon WHERE ID =".$id)) 
  {
    Header("Location:backend/resimler.php?durum=ok");
      exit;
  } 
else
  {
    Header("Location:backend/resimler.php?durum=ok");
      exit;

  }  
 } 

 
else if (isset($_GET['blogSil'])) { 
  $id =$_GET['blogSil']; 
  if ($baglanti->query("DELETE FROM blog WHERE ID =".$id)) 
  {
    Header("Location:backend/blog.php?durum=ok");
    exit;
  } 
else
  {
    Header("Location:backend/blog.php?durum=hata");
    exit;

  }  
 } 

 
 else if (isset($_GET['kulSil'])) { 
  $id =$_GET['kulSil']; 

           
    $baglantii = new PDO("mysql:host=localhost;dbname=merveyildirim", "root", "");
    $baglantii->exec("SET NAMES utf8");
    $baglantii->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sorgu = $baglantii->query("SELECT yetki FROM kullanici where ID=$id");

    $cikti = $sorgu->fetch(PDO::FETCH_ASSOC);

    $yetkiID =  $cikti["yetki"];
 
$baglantii = null; 
    
  if ($baglanti->query("DELETE FROM kullanici WHERE ID =".$id) && $baglanti->query("DELETE FROM yetki WHERE ID =".$yetkiID) )
  {
    Header("Location:backend/kullaniciLis.php?durum=ok");
    exit;
  } 
else
  {
    Header("Location:backend/kullaniciLis.php?durum=hata");
    exit;

  }  
 } 

 else if (isset($_POST['yorumSil'])) { 
  $id =$_POST['adi']; 
   if ($baglanti->query("DELETE FROM blogyorum WHERE ID =".$id)) 
  {
    echo "basarılı".$id;
   } 
else
  {
    echo "red".$id; 
  }  
 } 


 else if (isset($_GET['cikis'])) { 
  Session_start();
  Session_destroy();
    Header("Location:backend/blog.php?durum=ok");
    
 } 

  
ob_end_flush();
 ?>