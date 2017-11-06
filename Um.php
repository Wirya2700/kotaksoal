<?php include '/Function/ConnDatabase.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Kotak Soal - UM</title>
	<link rel="stylesheet" type="text/css" href="Style/Style.css"/>
</head>
<body>
	<div id="wrapper">
        <div id="header">
                <?php include "Header.php"; ?>
        </div>

        <div id="menu_content">
        	<div id="menu_content_left">
        		<?php 
                    $query = mysqli_query($mysqli ,"SELECT * FROM kategorisoal WHERE type LIKE'%UM%' ORDER BY waktu limit 10");
                    while ($data = mysqli_fetch_assoc($query)) {
                        echo "<div class='category' >";
                        echo "<h4><a href='DetailGroupSoal.php?kategori=".$data['idkategorisoal']."#1'>".$data['kategori']."</a></h4>";
                        echo "<p>Kode Soal : ".$data['kodekategori']."</p></br>";
                        echo "</div>";
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
                <?php include "Footer.html"; ?>
        </div>
    </div>
</body>
</html>