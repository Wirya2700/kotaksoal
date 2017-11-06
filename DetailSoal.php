<?php include '/Function/ConnDatabase.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
   <title>Kotak Soal - Detail Soal</title>
   <link rel="stylesheet" type="text/css" href="Style/Style.css"/>
</head>
<body>
   <div id="wrapper">
        <div id="header">
                <?php include "Header.php"; ?>
        </div>

        <div id="result_display">
            <div id="menu_content_left">
               <?php 
                  if(!empty($_GET) && array_key_exists('soal', $_GET)){
                     $varsearch = trim($_GET['soal']);

                     $query = mysqli_query($mysqli ,"SELECT * FROM soal WHERE idsoal = $varsearch LIMIT 1");
                     
                     if($query != null){
                        while ($data = mysqli_fetch_assoc($query)) {
                           echo "<div id='result_content_display_header' >";
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
                           break;
                        }    
                     }
                     
                  }else{
                     header("Location: "."Index.php");
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