<html>
<head>
	
<script type="text/javascript" src="jquery-2.0.2.min.js"></script>
<script type="text/javascript">
   $(function(){
      var i = 0;
      $('button').click(function(){
         $.ajax({
            url : "hitung.php",
            type : "GET",
            data : "count="+i,
            success: function(data){
               i = data;
               $('.tampil').append(" "+data);
            },
            error: function(data){
               alert("Tidak dapat memproses");
            }
         });
      });
   });
</script>
</head>
<body>
   <button> Hitung </button><br/><br/>
   <div class="tampil"></div>
</body>
