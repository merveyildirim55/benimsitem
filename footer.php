  
    <section id="ilet">
      <div class="box">
        <h2 class="section-title">İletişim</h2>
         <div class="row text-center services-2">
          <div class="col-md-4 col-sm-4"> <i class="budicon-map"></i>
            <p><?php echo $rows["il"]; ?></p>
          </div>
          <div class="col-md-4 col-sm-4"> <i class="budicon-telephone"></i>
            <p><?php echo $rows["telefon"]; ?> <br />
                </p>
          </div>
           
          <div class="col-md-4 col-sm-4"> <i class="budicon-mail"></i>
            <p> <a class="nocolor" href="mailto:#"><?php echo $rows["mail"]; ?></a> <br />
           </div>
        </div>
        <!-- /.services-2 -->
        <div class="divide30"></div>
        <div class="form-container">
          <div class="response alert alert-success"></div>
          <form class="" action="islem.php" method="post">
               <div class="row">
                <div class="col-sm-6">
                  <div class="form-row text-input-row name-field">
                    <label>İsim</label>
                    <input type="text" name="ad" class="text-input defaultText required"/>
                  </div>
                  <div class="form-row text-input-row email-field">
                    <label>Mail</label>
                    <input type="text" name="eposta" class="text-input defaultText required email"/>
                  </div>
                  <div class="form-row text-input-row subject-field">
                    <label>Konu</label>
                    <input type="text" name="konu" class="text-input defaultText"/>
                  </div>
                </div>
                <div class="col-sm-6 lp5">
                  <div class="form-row text-area-row">
                    <label>Mesajınız</label>
                    <textarea name="mesaj" class="text-area required"></textarea>
                  </div> 
                </div>
                <div class="col-sm-6">
                  <div class="button-row pull-right">
                    <input type="submit" name="insertMesaj" value="Gönder"  class="btn btn-submit" />
                  </div>
                </div>
                <div class="col-sm-6 lp5">
                  <div class="button-row pull-left">
                    <input type="reset" value="Temizle" name="reset" class="btn btn-submit bm0" />
                  </div>
                </div> 
              </div>
           </form>
        </div>
        <!-- /.form-container --> 
        
      </div>
      <!-- /.box --> 
    </section>
    <!-- /#contact -->
    
    <footer class="footer box">
      <p class="pull-left">© 2020 Tüm Hakkı Saklıdır  .</p> 
    </footer>
    <!-- /footer --> 
    
  </div>
  <!-- /.container --> 
</div>
<!-- /.body-wrapper --> 
<script src="style/js/jquery.min.js"></script> 
<script src="style/js/bootstrap.min.js"></script> 
<script src="style/js/jquery.themepunch.tools.min.js"></script> 
<script src="style/js/classie.js"></script> 
<script src="style/js/plugins.js"></script> 
<script src="style/js/scripts.js"></script>   
</body>
</html>
