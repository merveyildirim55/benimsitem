<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Merve</b> YILDIRIM
    </div>
    <strong>Tüm Hakkı Saklıdır &copy; 2020  
  </footer>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Filterizr-->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<!-- Page specific script -->
<script> 
$(document).ready(function(){
  $(".resimm").click(function(){ 
    
    $(".burayaGonderResimi").html( $(this).html());
    $(".resimSil").attr('idd', $(this).attr('id') ); 
  });

  $(".resimSil").click(function(){  
    swal({
  title: "Dikkat!!!",
  text: "Bu resimi silmek istediğine emin misin?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.get("../islem.php",
  {
    resimSil: $(this).attr('idd')
  },
  function(data, status){
    location.reload();
  });

    swal("Silindi!", {
      icon: "success",
    });
  } else {
    swal("Ohh Neyseki Vazgeçtin!");
  }
}); 
  });
 

  $(".blogSil").click(function(){  
    swal({
  title: "Dikkat!!!",
  text: "Bu Blok yazısını silmek istediğine emin misin?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.get("../islem.php",
  {
    blogSil: $(this).attr('idd'),
  },
  function(data, status){
    location.reload();
  });

    swal("Silindi!", {
      icon: "success",
    });
  } else {
    swal("Ohh Neyseki Vazgeçtin!");
  }
}); 
  });




}); 
//YENİ KATEGORİ EKLEME
     $(document).ready(function () {
        $("#kategoriEkle").click(function () {
          $adi =  $("#kategoriName").val();
          if($adi!="")
          {

            $.ajax({
                url: '../islem.php',
                type: 'POST',
                dataType: 'json',
                data: { kategoriEkle: "kategoriEkle", adi: $adi },
                success: function (gelenveri) {
                $("#kategori").html($("#kategori").html()+" <option value='"+gelenveri+"' valuee='"+$adi+"'>"+$adi+"</option>");
                swal("Başarılı!", "Yeni Kategori Eklendi Lütfen Listeden Seçin!", "success"); 
                },
                error: function (hata) {
                  swal("Hata!", "Beklenmeyen Hata!", "error");

                }
              });
            }
            else 
            {
              alert("Hata");
            }

        });
    });


    //YORUL Onay 

$(document).ready(function () {
        $(".yorumOnay").click(function () {
          $adi =  $(this).attr('idd');
          $adii =  $(this).parent().parent().parent().children("td:eq(4)").children().children("input").attr('vall') ;
          alert($adii);

          if($adi!="")
          {
            swal({
            title: "Dikkat!!!",
            text: "Bu Yayınlamak istediğine emin misin?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) { 
              $.ajax({
                url: '../islem.php',
                type: 'POST',
                dataType: 'json',
                data: { yorumOnay: "yorumOnay", adi: $adi, adii: $adii },
                success: function (gelenveri) { 
                swal("Başarılı!", "Yorum Başarıyla Güncellendi", "success");    setTimeout(function(){
              window.location.reload(1);
            }, 2000);
 
                },
                error: function (hata) {
                  swal("Başarılı!", hata+"", "success");      setTimeout(function(){
                  window.location.reload(1);
                },2000); 
                }
              });
    
  } else {
    swal("Ohh Neyseki Vazgeçtin!");
  }
});  
            }
            else 
            {
              alert("Hata");
            }
        });
    });
    //YORUL Onay 

    $(document).ready(function () {
        $(".checkbox").click(function () {
             $temel=$(this).attr("idd");
            $val = ($temel==1)?"0":"1";
            $temel=$(this).attr("idd",$val); 
         });
    });
$(document).ready(function () {
        $(".yetkiDuzenle").click(function () {
             $temel=$(this).parent().parent().parent().parent().children("div:eq(2)").children("div:eq(0)").children().children().children().children("input").attr("idd");
             $resim=$(this).parent().parent().parent().parent().children("div:eq(2)").children("div:eq(1)").children().children().children().children("input").attr("idd");
             $yorum=$(this).parent().parent().parent().parent().children("div:eq(2)").children("div:eq(2)").children().children().children().children("input").attr("idd");
             $hakkimda=$(this).parent().parent().parent().parent().children("div:eq(2)").children("div:eq(3)").children().children().children().children("input").attr("idd");
             $kullanici=$(this).parent().parent().parent().parent().children("div:eq(2)").children("div:eq(4)").children().children().children().children("input").attr("idd");
             $blog=$(this).parent().parent().parent().parent().children("div:eq(2)").children("div:eq(5)").children().children().children().children("input").attr("idd");

             $yID = $(this).attr("idd");
             swal({
            title: "Dikkat!!!",
            text: "Bu Yorumu silmek istediğine emin misin?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) { 
              $.ajax({
                url: '../islem.php',
                type: 'POST',
                dataType: 'json',
                data: { temel: $temel,yetkiDuz: "ok", resim: $resim, hakkimda: $hakkimda, kullanici: $kullanici, blog: $blog, yorum: $yorum, yID: $yID },
                success: function (gelenveri) { 
                swal("Başarılı!", "Yorum Başarıyla Silidi!", "success");    setTimeout(function(){
              window.location.reload(1);
            }, 2000);
 
                },
                error: function (hata) {
                  swal("Başarılı!", "Yorum Başarıyla Silidi!", "success");      setTimeout(function(){
                  window.location.reload(1);
                },2000); 
                }
              });
    
  } else {
    swal("Ohh Neyseki Vazgeçtin!");
  }
});  
        });
    });
//YORUL SİLME 

$(document).ready(function () {
        $(".yorumSil").click(function () {
          $adi =  $(this).attr('idd');
          if($adi!="")
          {
            swal({
            title: "Dikkat!!!",
            text: "Bu Yorumu silmek istediğine emin misin?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) { 
              $.ajax({
                url: '../islem.php',
                type: 'POST',
                dataType: 'json',
                data: { yorumSil: "yorumSil", adi: $adi },
                success: function (gelenveri) { 
                swal("Başarılı!", "Yorum Başarıyla Silidi!", "success");    setTimeout(function(){
              window.location.reload(1);
            }, 2000);
 
                },
                error: function (hata) {
                  swal("Başarılı!", "Yorum Başarıyla Silidi!", "success");      setTimeout(function(){
                  window.location.reload(1);
                },2000); 
                }
              });
    
  } else {
    swal("Ohh Neyseki Vazgeçtin!");
  }
});  
            }
            else 
            {
              alert("Hata");
            }

        });
    });
 
    //TABLO İŞLEMLERİ

   $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
$(".duzenle").click(function(e) {

      if ($("#duzenlemeButton").children().hasClass("fa-plus"))
      {
      $("#duzenlemeButton").trigger( "click" );
    }
    
    $( "input[name='baslik']" ).val($(this).parent().parent().parent().children("td:eq(0)").html());
    $( "textarea[name='icerik']" ).html($(this).parent().parent().parent().children("td:eq(1)").html());
    $("#kategori option[valuee="+$(this).parent().parent().parent().children("td:eq(2)").html()+"]").prop('selected', true); 
    $( "#blokDüzenlemesi" ).show();
    $( "#blokEklemesi" ).hide();
    $( "input[name='tarih']" ).val($(this).parent().parent().parent().children("td:eq(3)").html());
    $( "#blokDüzenlemesi" ).val($(this).parent().parent().parent().children("td:eq(5)").html()); 
    $( ".düzenlemeUyarisiDiv" ).show(); 
    $( ".düzenlemeUyarisi" ).html("Düzenleme Kısmında <b>"+$(this).parent().parent().parent().children("td:eq(0)").html()+"</b> Başlıklı blog yer almakta yeni blok eklemek için liste üstündeki Yeni Blok Ekle butonuyla alanı temizlemeniz gerekmektedir"); 
});

$(".duzenleKul").click(function(e) {

      if ($("#KulduzenlemeButton").children().hasClass("fa-plus"))
      {
      $("#KulduzenlemeButton").trigger( "click" );
    }
    $( "input[name='IDD']" ).val($(this).parent().parent().parent().children("td:eq(4)").html()); 
    $( "input[name='ad']" ).val($(this).parent().parent().parent().children("td:eq(0)").html());
    $( "input[name='soru']" ).val($(this).parent().parent().parent().children("td:eq(1)").html());
     $( "#blokDüzenlemesi" ).show();
    $( "#blokEklemesi" ).hide();
    $( "#kulSif" ).hide();
    $( "input[name='cevap']" ).val($(this).parent().parent().parent().children("td:eq(2)").html()); 
    $( ".düzenlemeUyarisiDiv" ).show(); 
    $( ".düzenlemeUyarisi" ).html("Düzenleme Kısmında <b>"+$(this).parent().parent().parent().children("td:eq(1)").html()+"</b> Adlı Kullanıcı yer almakta yeni Kullanıcı eklemek için liste üstündeki Yeni Blok Ekle butonuyla alanı temizlemeniz gerekmektedir"); 
});
//KULLANICI EKLEME BUTONUNUN GÖREVLERİ

$(".KulduzenlemeButton").click(function(e) {
  $( "input[name='ad']" ).val("");
  
    $( "input[name='soru']" ).val("");
    $( "input[name='cevap']" ).val("");

    $( "#blokDüzenlemesi" ).val("");
    $( "#blokDüzenlemesi" ).hide();
    $( "#kulSif" ).show();
    $( "#blokEklemesi" ).show();   
     $( ".düzenlemeUyarisiDiv" ).hide(); 
     $( ".düzenlemeUyarisi" ).html(""); 

    if ($("#KulduzenlemeButton").children().hasClass("fa-plus"))
      {
      $("#KulduzenlemeButton").trigger( "click" );
    }
});


$(".duzenlemeButton").click(function(e) {
  $( "input[name='baslik']" ).val("");
    $( "textarea[name='icerik']" ).html(""); 
 
    $( "input[name='tarih']" ).val("");
    $( "#blokDüzenlemesi" ).val("");
    $( "#blokDüzenlemesi" ).hide();
    $( "#blokEklemesi" ).show();   
     $( ".düzenlemeUyarisiDiv" ).hide(); 
     $( ".düzenlemeUyarisi" ).html(""); 

    if ($("#duzenlemeButton").children().hasClass("fa-plus"))
      {
      $("#duzenlemeButton").trigger( "click" );
    }
});

 
  </script>
</body>
</html>