		<?php
		class handphone {
			var $jml_pulsa;
			
			function mengirim_pesan($tarif, $jml_pesan=1){
				$this->jml_pulsa -= $tarif*$jml_pesan;
			}
		}

		$hp_latif = new handphone();
		$hp_latif->jml_pulsa = 2000;

		echo "Jumlah pulsa Latif ";
		echo $hp_latif->jml_pulsa;
		echo "<br>";

		$hp_latif->mengirim_pesan(150);

		echo "Jumlah pulsa sekarang ";
		echo $hp_latif->jml_pulsa;
		echo "<br>";

		$hp_latif->mengirim_pesan(100, 2);

		echo "Jumlah pulsa sekarang ";
		echo $hp_latif->jml_pulsa;

		?>