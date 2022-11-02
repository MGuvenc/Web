<?php
  ob_start();
  session_start();
  include("config.php");
  /* Oturum Kontrolü */
  if(isset($_SESSION["mail"])){
    echo '<meta http-equiv="refresh" content="0;url=index.php">';
  }else{
  
?>
<!doctype html>
<html lang="TR">
<head>
    <title>Üyelik</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/uyelik.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <div class="giris">
    <div class="form">
      <form class="kayit" action method="POST">
        <input type="text" id="isim" name="isim" placeholder="Adınız" required/>
        <input type="email" id="mail" name="mail" placeholder="Mail Adresiniz" required/>
        <input type="password" id="sifre" name="sifre" placeholder="Şifreniz" required/>
        <input type="tel" id="telefon" name="telefon" placeholder="5456263199" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required/>
        <input type="text" id="adres" name="adres" placeholder="Adresiniz" required/>
        <input type="date" id="dogum_tarihi" name="dogum_tarihi" value="2022-01-01" min="1950-01-01" max="2004-12-31" required/>
        <button name="btn" id="btn">Oluştur</button>
        <p class="mesaj">Zaten Üye Misin ? <a href="#">Giriş Yap</a></p>
      </form>
 

      <form class="giris-from" action method="POST">
        <input type="text" name="mail" placeholder="Mail Adresiniz" required/>
        <input type="password" name="sifre" placeholder="Şifreniz" required/>
        <button name="btn2" id="btn2">Giriş Yap</button>
        <p class="mesaj">Üye Değil Misin? <a href="#">Hesap Oluştur</a></p>
      </form>
 
    </div>
  <?php
    /* Üyelik Kaydı */
    if(isset($_POST["btn"])){
      if(!empty($_POST["isim"])&&!empty($_POST["mail"])&&!empty($_POST["sifre"])&&!empty($_POST["telefon"])&&!empty($_POST["adres"])&&!empty($_POST["dogum_tarihi"])){
        $isim = $_POST["isim"];
        $mail = $_POST["mail"];
        $sifre = $_POST["sifre"];
        $telefon = $_POST["telefon"];
        $adres = $_POST["adres"];
        $dogum_tarihi = $_POST["dogum_tarihi"];
        $sql = "INSERT INTO uyelik (isim, mail, sifre, telefon, adres, dogum_tarihi) VALUES ('".$isim."', '".$mail."', '".$sifre."', '".$telefon."', '".$adres."', '".$dogum_tarihi."')";
        if($conn->query($sql) === TRUE){
          echo '<div class="w3-panel w3-pale-green w3-round-large w3-border">
                <h3>Üyelik Kaydı Başarılı!</h3>
                <p>Giriş Yapabilirsiniz.</p>
                </div>';
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      }
    }
    
    /* Üyelik Girişi */
    if(isset($_POST["btn2"])){
      if(!empty($_POST["mail"])&&!empty($_POST["sifre"])){
        $mail = $_POST["mail"];
        $sifre = $_POST["sifre"];
        
        $sql=mysqli_query($conn,"SELECT * FROM uyelik WHERE mail='$mail'");
        $row=mysqli_fetch_array($sql);
        $count = mysqli_num_rows($sql);
        
        if( $count == 1 && $row['sifre']==$sifre){
        $_SESSION['mail'] = $row['mail'];
        $_SESSION['isim'] = $row['isim'];
        echo '<div class="w3-panel w3-pale-green w3-round-large w3-border">
        <h3>Giriş Başarılı!</h3>
        <p>Yönlendiriliyorsunuz.</p>
        </div><meta http-equiv="refresh" content="3;url=index.php">';
        }else{
          echo '<div class="w3-panel w3-pale-red w3-round-large w3-border">
          <h3>Giriş Başarısız!</h3>
          <p>Mail Veya Şifre Yanlış.</p>
          </div>';
        }
      }
    }
  ?>
</div>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="js/uyelik.js"></script>
<html>
<?php } ?>