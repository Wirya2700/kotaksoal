<?php include '/Function/ConnDatabase.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Kotak Soal - Detail Group Soal</title>
	<link rel="stylesheet" type="text/css" href="Style/Style.css"/>
</head>
<body>
	<div id="wrapper">
      <div id="header">
         <?php include "Header.php"; ?>
      </div>
      
      <?php 
         if(!empty($_GET) && array_key_exists('kategori', $_GET)){
            $varsearch = trim($_GET['kategori']);
            $detailkategori = null;

            $query = mysqli_query($mysqli ,"SELECT * FROM detailgroupsoal WHERE idkategorisoal = $varsearch LIMIT 1");
            if(array_key_exists('detailkategori', $_GET)){
               $detailkategori =$_GET['detailkategori'];
               $query = mysqli_query($mysqli ,"SELECT * FROM detailgroupsoal WHERE idkategorisoal = $varsearch AND iddetailkategorisoal=$detailkategori LIMIT 1");
            }
         }

         if($query != null){
            while ($data = mysqli_fetch_assoc($query)) {
               echo "<div id='result_content'>";
               echo "<div id='result_content_display'>";
               echo "<div id='result_content_display_header' >";
               echo "<h4>".$data['kategori']."</h4>";
               echo "<table border='0'>";
               echo "<tr>";
               echo "<td width='20px' valign='top'>? : </td>";
               echo "<td>".$data['soal']."</td>";
               echo "</tr>";
               echo "</table>";
               echo "</br>";
               echo "<h5>Sumber : ".$data['sumber']."</h6>";
               echo "</div>";

               echo "<div id='result_content_display_video'>";
               echo "<iframe width='100%' height='413' src='".$data['urlvidio']."' frameborder='0' allowfullscreen></iframe>";
               echo "<table border='0'>";
               echo "<tr>";
               echo "<td>Oleh</td>";
               echo "<td>:</td>";
               echo "<td>".$data['nama']."</td>";
               echo "</tr>";
               echo "<tr>";
               echo "<td>Chanel</td>";
               echo "<td>:</td>";
               echo "<td><a href='".$data['urlchanel']."'  target='_blank'>".$data['chanel']."</td>";
               echo "</tr>";
               echo "<tr>";
               echo "<td>Situs</td>";
               echo "<td>:</td>";
               echo "<td><a href='".$data['urlsitus']."'  target='_blank'>".$data['namasitus']."</td>";
               echo "</tr>";
               echo "</table>";
               echo "</div>";
               echo "</div>";

               echo "<div id='result_content_list'>";
               echo "<ul>";
               echo "<h3>Daftar Soal</h3>";
               $query = mysqli_query($mysqli ,"SELECT * FROM detailgroupsoal WHERE idkategorisoal = $varsearch LIMIT 100");
               $index=1;
               while ($data1 = mysqli_fetch_assoc($query)) {
                  echo "<li><a href='#$index'>$index. ".substr($data1['soal'], 0,45)."...</a></li>";
                  echo "<div id='$index' class='accordion'>";
                  echo "<p>".$data1['soal'];
                  echo " <a href='DetailGroupSoal.php?kategori=".$data1['idkategorisoal']."&detailkategori=".$data1['iddetailkategorisoal']."#$index'>Penjelasan</a></p>";
                  echo "</div>";
                  $index++;
               }

               echo "</ul>";
               echo "</div>";
               echo "</div>";
            }
         }else{
            header("Location: "."Index.php");
         }
      ?>

      <div id="footer">
         <?php include "Footer.html" ?>
      </div>

   </div>
</body>  
</html>