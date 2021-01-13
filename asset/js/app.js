$( document ).ready(function() {
	 $('#kota_asal').select2({
	    placeholder: ' ',
	    language: "id"
	 });

	 $('#kota_tujuan').select2({
	    placeholder: 'silakan pilih kota anda',
	    language: "id"
    });
   //  cod
   //  $('#kota_tujuan_cod').select2({
   //    placeholder: '',
   //    language: "id"
   // });

    $.ajax({
      type: "GET",
      dataType: "html",
      url: "data-kota.php?q=kotaasal",
      success: function(msg){
      $("select#kota_asal").html(msg);                                                     
      }
    });    
 
	$.ajax({
      type: "GET",
      dataType: "html",
      url: "data-kota.php?q=kotatujuan",
      success: function(msg){
      $("select#kota_tujuan").html(msg);                                              
      }
   });
   // cod
   // $.ajax({
   //    type: "GET",
   //    dataType: "html",
   //    url: "data-kota.php?q=kotatujuancod",
   //    success: function(msg){
   //    $("select#kota_tujuan").html(msg);                                              
   //    }
   // });

   $("#ongkir").submit(function(e) {
      e.preventDefault();
      $.ajax({
          url: 'cek-ongkir.php',
          type: 'post',
          data: $( this ).serialize(),
          success: function(data) {
            //  data.data.nama[0]
            // console.log(data);
            document.getElementById("response_ongkir").innerHTML = data;
          }
      });
  });

  $("#form").submit(function(e) {
   e.preventDefault();
   $.ajax({
       url: 'insert.php',
       type: 'post',
       data: $( this ).serialize(),
       success: function(data) {
         //  data.data.nama[0]
         // console.log(data);
         document.getElementById("tampil").innerHTML = data;
       }
   });
});
// $('#formselesai').submit(function() {
//    $.ajax({
//        method: 'POST',
//        url: 'contoh.php',
//        data: $( this ).serialize(),
//        success: function() {
//             window.open("contoh.php"); //this page will be open in new tab
//        }
//    });

// });

});

