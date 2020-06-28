<h2 class="page-header">Dashboard</h2>
<div class="row">
<?php
   create_panel("teal", "th-large", $data['jmlkategori'], "Jumlah Kategori");
   create_panel("blue", "gift", $data['jmlproduk'], "Jumlah Produk");
   create_panel("orange", "shopping-cart", $data['jmltransaksi'], "Orderan Baru");
   create_panel("red", "envelope", $data['jmlpesan'], "Pesan Baru");
?>
</div>
<?php
   start_content();
?>
   <h3 class="page-header">Grafik Penjualan</h3>
   <div class="canvas-wrapper">
      <canvas id="line-chart" height="150" width="600"></canvas>
   </div>
<?php
   end_content();
?>

<script type="text/javascript">
$(function(){
   //Pengaturan chart
   var lineChartData = {
      labels : <?= json_encode($data['namabulan']) ?>,
      datasets : [{
            fillColor : "rgba(48, 164, 255, 0.2)",
            strokeColor : "rgba(48, 164, 255, 1)",
            pointColor : "rgba(48, 164, 255, 1)",
            pointStrokeColor : "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(48, 164, 255, 1)",
            data : <?= json_encode($data['data']) ?>
         }]
      }
   var chart = document.getElementById("line-chart").getContext("2d");
   window.myLine = new Chart(chart).Line(lineChartData, {
      responsive: true
   });
});
</script>