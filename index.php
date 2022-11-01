<?php
  include("config.php");
  if(isset($_POST["btn"])){
    if(!empty($_POST["isim"])&&!empty($_POST["mail"])&&!empty($_POST["sifre"])&&!empty($_POST["telefon"])&&!empty($_POST["adres"])&&!empty($_POST["dogum_tarihi"])){
      $isim = $_POST["isim"];
      $mail = $_POST["mail"];
      $sifre = $_POST["sifre"];
      $telefon = $_POST["telefon"];
      $adres = $_POST["adres"];
      $dogum_tarihi = $_POST["dogum_tarihi"];
      $sql = "INSERT INTO uyelik (isim, mail, sifre, telefon, adres, dogum_tarihi) VALUES ($isim, $mail, $sifre, $telefon, $adres, $dogum_tarihi)";
      if($conn->query($sql) === TRUE){
        echo "Üyelik Başarılı";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
    }else{
     echo("Boş alan bırakmayın!");
    }
  }
?>
<!doctype html>
<html lang="TR">
<head>
    <title>Üyelik</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/index.css">  
</head>
<body>
  <div class="giris">
    <div class="form">
      <form class="kayit" action method="POST">
        <input type="text" name="isim" placeholder="Adınız"/>
        <input type="text" name="mail" placeholder="Mail Adresiniz"/>
        <input type="password" name="sifre" placeholder="Şifreniz"/>
        <input type="text" name="telefon" placeholder="Telefon Numaranız"/>
        <input type="text" name="adres" placeholder="Adresiniz"/>
        <input type="text" name="dogum_tarihi" placeholder="Doğum Tarihiniz"/>
        <button name="btn" id="btn">Oluştur</button>
        <p class="mesaj">Zaten Üye Misin ? <a href="#">Giriş Yap</a></p>
      </form>
 

      <form class="giris-from" action method="POST">
        <input type="text" name="mail" placeholder="Mail Adresiniz"/>
        <input type="password" name="sifre" placeholder="Şifreniz"/>
        <button name="btn2" id="btn2">Giriş Yap</button>
        <p class="mesaj">Üye Değil Misin? <a href="#">Hesap Oluştur</a></p>
      </form>
 
    </div>
  <div id="mesaj"><p class="mesaj"></p></div>
  </div>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="js/index.js"></script>
<html>