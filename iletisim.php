<?php 
     ob_start(); 
     session_start(); 
     include("config.php"); 
     /* Oturum kontrolü */ 
     if(!isset($_SESSION["mail"])){ 
         echo '<meta http-equiv="refresh" content="0;url=uyelik.php">'; 
     }else{ 
 ?> 
 <!doctype html> 
 <html lang="TR"> 
 <head> 
     <title>2.El Kitap</title> 
     <meta charset="UTF-8"> 
         <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <link rel="stylesheet" type="text/css" href="css/index.css">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 </head> 
 <body> 
     <header> 
         <h1>2.EL KITAP SATISI</h1> 
     </header> 
  
     <ul> 
         <li><a href="index.php">Ana Sayfa</a></li>
         <li><a href="iletisim.php">İletişim</a></li> 
         <li><a href="sepet.php">Sepet</a></li> 
         <li><a href="#"><?php echo $_SESSION["isim"]; ?></a></li>
         <li><a href="cikis.php">Çıkış</a></li>
     </ul> 
  
     <nav> 
         <h3>KATEGORİLER</h3> 
         <?php 
         $sql = mysqli_query($conn, "SELECT * FROM kategori"); 
         while($row = mysqli_fetch_array($sql)){ 
             echo '<a href="index.php?id='.$row["id"].'">'.$row["kategori_adi"].'</a>'; 
         } 
         ?> 
     </nav> 
     <section style="float: left;"> 
     <form action method="POST"> 
     <textarea placeholder="Mesajınız.." name="mesaj" minlength="15" required></textarea> 
     <button class="button button1" name="butonI" style="margin-left: 50px; background-color: #8DC26F; color: white;">GÖNDER</button> 
     </form> 
     <?php 
     if(isset($_POST["butonI"])){
         $id = $_SESSION["id"];
         $mesaj = $_POST["mesaj"];
         $sql = "INSERT INTO iletisim (uye_id, mesaj) VALUES ('".$id."', '".$mesaj."')";
        if($conn->query($sql)=== TRUE){ 
        echo '<div class="w3-panel w3-pale-green w3-round-large w3-border"> 
            <h3>Mesajınız Alınmıştır!</h3> 
             <p>İlgili birimimiz sizinle iletişime geçecektir.</p>       
             </div>'; 
        }
         $conn->close();
     } 
  
     ?> 
     </section> 
     <footer>MGuvenc</footer> 
 </body> 
 </html>
 <?php } ?>