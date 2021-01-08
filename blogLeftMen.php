
        <!-- /.widget -->
        
        <div class="sidebox box widget">
          <h3 class="widget-title section-title">Kategoriler</h3>
          <ul class="circled">
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

            $sql = "SELECT * FROM blogKat";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while($blogKat = $result->fetch_assoc()) {
 
              echo  '<li><a href="blog.php?katID='.$blogKat["ID"].'&katGetir=ok">'.$blogKat["ad"].' </a></li> 

              ';
            }
            } else {
            echo "Mesaj Yok";
            }
            $conn->close(); 

            ?>
                       

          </ul>
        </div>
        <div class="sidebox box widget">
          <h3 class="widget-title section-title">En çok yorum alan 3 blog yazım</h3>
          <ul class="post-list">
            
          <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "merveyildirim";
$sayac =0;
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT b.*,( SELECT COUNT(*) FROM blogyorum WHERE onay = 1 and blogId=b.ID )as yorum,bk.ad FROM blog b LEFT join blogyorum c ON c.blogId=b.ID join blogkat bk on b.kategori = bk.ID  GROUP BY b.ID ORDER BY COUNT(c.yorum) DESC ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while($populerBlog = $result->fetch_assoc()) { 
              $sayac++;
                echo  ' <li> 
                <span><div class="text-overlay" style="color:purple"><span class="category">'.$populerBlog["ad"].'</span>-<span class="date">'.$populerBlog["tarih"].'</span>-<span class="comments"><span>'.$populerBlog["yorum"].'<i class="icon-chat-1"></i></span></span></span>
                <p><a href="tumBlog.php?id='.$populerBlog["ID"].'&blogOku=ok">'.$populerBlog["baslik"].'</a></p>
                </div>
              </li>
              ';
              if ($sayac==3) {break;
                # code...
              }
            }
            } else {
            echo "Mesaj Yok";
            }
            $conn->close(); 

            ?>




          </ul>
          <!-- /.post-list --> 
        </div>
        <!-- /.widget -->
        
        <!-- /.widget -->
        
        <div class="sidebox box widget">
          <h3 class="widget-title section-title">Daha fazlası</h3>
          <p>Yazılarımdan önceden haberdar olmak için beni takip edin.</p>
          <ul class="social">
            <li><a href="#"> </li>
            <li><a href="#"> </li>
            <li><a href="#"> </li>
        <li><a target="_blank" href="<?php echo $rows["ins"]; ?>"><i class="icon-s-twitter"></i></a></li>   
        <li><a target="_blank" href="<?php echo $rows["twet"]; ?>"><i class="icon-s-instagram"></i></a></li> 
            <li><a href="#"> </li>
            <li><a href="#"> </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <!-- /.widget --> 
        
      </aside>
      <!-- /column .sidebar --> 
    </div>
    <!-- /.blog -->  
