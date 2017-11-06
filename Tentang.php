<?php include '/Function/ConnDatabase.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Kotak Soal - Tentang</title>
	<link rel="stylesheet" type="text/css" href="Style/Style.css"/>
</head>
<body>
	<div id="wrapper">
      <div id="header">
         <?php include "Header.php"; ?>
      </div>
      
      <div id="menu_content">
         <div id="menu_content_left">
            <p>
               <a href="index.php"><strong>KotakSoal.Com</strong></a> yaitu website yang mengumpulkan soal dari tingkat SLTP hingga soal masuk Perguruan Tinggi dengan vidio dari <a href="https://youtube.com" target="_blank">YouTube.Com</a>. yang didesain sehingga mempermudah dalam mencari soal yang di inginkan. <a href="index.php">KotakSoal.Com</a> selalu menjaga keaslian vidio, tidak mengedit vidio, menampilkan sumber vidio, tanpa melanggar hakcipta.
            </p>
            <br>
            <p>
               Jika terdapat vidio anda di <a href="index.php">KotakSoal.Com</a> dan vidio anda tidak ingin ditampilkan di website ini, anda bisa kirim Email ke <strong>Belu@Ketemu.com</strong> dengan mencantumkan URL vidio tersebut, jika URL vidio yang dikirimkan sesuai dengan anda pemiliknya kami tidak akan lagi menampilkan vidio anda di <a href="index.php">KotakSoal.Com</a>.
            </p>
            <br>
            <p>
               Jika di <a href="index.php">KotakSoal.Com</a> terdapat hal-hal yang melanggar hakcipta, anda bisa kirim Email ke <strong>Belu@Ketemu.com</strong> kami dengan senang hati akan memperbaiki atau menghilangkan hal yang merugikan pihak lain.
            </p>
            <br>
            <p>
               Jika di <a href="index.php">KotakSoal.Com</a> terdapat kesalahan jawaban atau jawaban tidak tepat, anda bisa kirim Email ke <strong>Belu@Ketemu.com</strong> kami dengan senang hati akan memperbaiki.
            </p>
            <br>
            <p>
               Kritik dan Saran anda bisa kirim ke <strong>Belu@Ketemu.com</strong> kami menerima dengan senag hati.
            </p>
            <br>
            <p>
               Terima kasih telah mengunjungi <a href="index.php">KotakSoal.Com</a>.
            </p>
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
         <?php include "Footer.html" ?>
      </div>

   </div>
</body>  
</html>