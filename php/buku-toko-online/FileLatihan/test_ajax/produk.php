<html>
<head>
	
<script type="text/javascript" src="jquery-2.0.2.min.js"></script>
<script type="text/javascript">
   $(function(){
      $.ajax({
         url : "json.php",
         type : "GET",
         dataType : "JSON",
         success: function(data){
            for(i=0; i<data.length; i++){
               $('tbody').append('<tr><td>'+data[i].nama_produk+
               '</td><td>'+data[i].harga+'</td></tr>');
            }
         },
         error: function(data){
            alert("Tidak dapat memproses");
         }
      });
   });
</script>

</head>
<body>
   <form id="myform">
      <table border="1" cellspacing="0" width="100%">
         <thead>
            <tr><th>NAMA PRODUK</th><th>HARGA</th></tr>
         </thead>
         <tbody></tbody>
      </table>
   </form>
</body>
</html>
