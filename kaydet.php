<?php
include 'baglan.php';

$kaynak = $_FILES["fileUp"]["tmp_name"]; // tempdeki adı

        $ad = md5(uniqid()).$_FILES["fileUp"]["name"]; // dosya adı

        $tip = $_FILES["fileUp"]["type"]; // dosya tipi

        $boyut = $_FILES["fileUp"]["size"]; // boyutu

                  // başta açtıgımız klasör adımız..
        $kategori = $_POST['taskOption'];
        

        $kaydet = move_uploaded_file($kaynak,"style/images/res/".$ad); // resmimizi klasöre kayıt ettiriyoruz.

        if($kaydet) // eğer kayıt ettiysek uyarı mesajı yazdırdık.

        {
   
            if ($baglanti->query("INSERT INTO resimkon (Konum,resimKat) VALUES ('$ad',$kategori)")) 
            {
              Header("Location:backend/resimler.php?durum=ok");
            }
                    

        }else { echo "Kayit yapilmadi"; }

?>