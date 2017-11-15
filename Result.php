<?php include 'conndatabase.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Kotak Soal - Result</title>
	<link rel="stylesheet" type="text/css" href="Style/Style.css"/>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<?php include "header.php"; ?>
		</div>

		<div id="menu_content">
			<div id='menu_content_left'>
				<?php 
					if(!empty($_POST)){
						$query = trim($_POST['cari']);
						$querySearch = str_replace("'", "", $query);

						if(is_numeric($querySearch)){
							
							$query = mysqli_query($mysqli ,"SELECT * FROM kategorisoal WHERE kodekategori LIKE '%$querySearch%' ORDER BY waktu limit 10");

							echo "<h4 class='menu_content_header'>Pencarian Berdasarkan Kode Soal</h4>";
		                    while ($data = mysqli_fetch_assoc($query)) {
		                        echo "<div class='category' >";
		                        echo "<h4><a href='detailgroupsoal.php?kategori=".$data['idkategorisoal']."#1'>".$data['kategori']."</a></h4>";
		                        echo "<p>Kode Soal : <span style='background-color: yellow'>".$data['kodekategori']."</span></p></br>";
		                        echo "</div>";
		                    }
						}else{
							echo "<h4 class='menu_content_header'>Pencarian Berdasarkan Soal</h4>";

							$arraySearch = str_replace(" ", "%", $querySearch);
							$defaultSearch = split("[ ]", $querySearch);
							$existId = "";
							$countResult=0;

							$query = mysqli_query($mysqli ,"SELECT * FROM soal WHERE soal LIKE '%$arraySearch%' limit 10");

							while ($data = mysqli_fetch_assoc($query)) {
								$higlight="";
								for ($i=0; $i < count($defaultSearch); $i++) { 
									$higlight .= " ".$defaultSearch[$i];
									if ($i == 2){
										break;
									}
								}

								$higlight = str_replace(trim($higlight), "<b><u>".trim($higlight)."</u></b>", $data['soal']);

								echo "<div class='detail_result' >";
								echo "<p>".$higlight."</p><br>";
								echo "<a href='detailsoal.php?soal=".$data['idsoal']."'>Detail Soal</a>";
								echo "</div>";

								$existId .= $data['idsoal']." ";
								$countResult++;
							}

							if (mysqli_num_rows($query) <= 3){
								$tripleSearch = "";
								$higlight="";
								$queryTriple = "SELECT * FROM soal WHERE ";

								for ($i=0; $i < count($defaultSearch); $i++) { 
									$tripleSearch .= "%".$defaultSearch[$i]."%";
									$higlight .= " ".$defaultSearch[$i];
									if ($i == 2){
										break;
									}
								}

								$existId = split("[ ]", trim($existId));

								if(count($existId) > 0 && $existId[0] != ""){
									for ($i=0; $i < count($existId); $i++) { 
										$queryTriple .= " idsoal != ".$existId[$i]." and ";
									}   
								}

								$query = mysqli_query($mysqli , $queryTriple." soal LIKE '%".$tripleSearch."%' limit 10");

								$arrayData = split("[ ]", $higlight);
								while ($data = mysqli_fetch_assoc($query)) {
									$higlightData = $data['soal'];
									for ($i=0; $i < count($arrayData); $i++) { 
										$higlightData = str_replace(trim($arrayData[$i]), "<b><u>".$arrayData[$i]."</i></u>", $higlightData);
									}

									echo "<div class='detail_result' >";
									echo "<p>".$higlightData."</p><br>";
									echo "<a href='detailsoal.php?soal=".$data['idsoal']."'>Detail Soal</a>";
									echo "</div>";
									$countResult++;
								}
							}
						}
					}else{
						header("Location: "."index.php");
					}
				?>
			</div>

			<div id="menu_content_right">
                <h4>Chanel & Situs</h4>
                <?php 
                    $query = mysqli_query($mysqli ,"SELECT * FROM situschanel");
                    while ($data = mysqli_fetch_assoc($query)) {
                            echo "<p><a href='".$data['urlsitus']."' target='_blank'>".$data['namasitus']."</a></p>";
                            echo "<p><a href='".$data['urlchanel']."' target='_blank'>".$data['chanel']."</a></p>";
                    }
                ?>
        	</div>
		</div>

		<div id="footer">
			<?php include "footer.html" ?>
		</div>
	</div>
</body>
</html>