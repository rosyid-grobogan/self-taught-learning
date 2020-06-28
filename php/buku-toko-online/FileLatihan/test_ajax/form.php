<html>
<head>
	
<script type="text/javascript" src="jquery-2.0.2.min.js"></script>
	
<script type="text/javascript">
   $(function(){
      $('#myform').submit(function(){
         $.ajax({
            url : "simpan.php",
            type : "POST",
            data : $(this).serialize(),
            success: function(data){
               alert(data);
               $('[name=nama]').val("");
               $('[name=harga]').val("");
            },
            error: function(data){
               alert("Tidak dapat memproses");
            }
         });
         return false;
      });
   });
</script>

</head>
<body>
	
Masukkan data produk!
<form id="myform">
   <table>
      <tr>
         <td>Nama Produk </td> 
         <td>: <input type="text" name="nama"></td>
      </tr>
      <tr>
          <td>Harga </td>	
          <td>: <input type="number" name="harga"></td>
      </tr>
      <tr>
          <td colspan="2"><button>Simpan</button></td>
      </tr>
   </table>
   </form>
</body>
</html>
