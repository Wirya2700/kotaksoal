<div id="menuheader">
	<h3><a href="index.php">Soal</a></h3>
	<form method="POST" action="result.php">
		<input type="search" name="cari" placeholder="Masukan Kode atau Soal di sini" width="100px" 
		<?php 
			if(!empty($_POST)){
				echo "value='".str_replace("'", "", $_POST['cari'])."'";
			}	
		?>>
	</form>
	<ul>
		<a href="sltp.php"><li>SMP/MTs</li></a>
		<a href="slta.php"><li>SMA/SMK</li></a>
		<a href="latihan.php"><li>LATIHAN</li></a>
		<a href="um.php"><li>UM</li></a>
		<a href="sbmptn.php"><li>SBMPTN</li></a>
	</ul>
</div>