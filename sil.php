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
    
    <section>
        <?php
            if(!empty($_GET["id"])){
                $sql = "DELETE FROM sepet WHERE urun_id = ".$_GET['id']."";
                if($conn->query($sql) === TRUE){
                    echo '<div class="w3-panel w3-pale-red w3-round-large w3-border">
                      <h3>Ürününüz Sepetten Çıkarıldı!</h3>
                      <p>Alışverişinize Devam Edebilirsiniz.</p>
                      </div>';
                }else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        $sql = mysqli_query($conn, "SELECT * FROM sepet WHERE uye_id='".$_SESSION["id"]."'");
        $i=0;
        $toplam=0;
            while($row = mysqli_fetch_array($sql)){
                $sql2 = mysqli_query($conn, "SELECT * FROM urunler WHERE id='".$row["urun_id"]."'");
                $row2 = mysqli_fetch_array($sql2);
                echo '<div class="kitap">
                <img src="'.$row2["resim_yolu"].'" width="100px">
                <h5>'.$row2["ad"].'</h5>
                <h6>'.$row2["yazar"].'</h6>
                <a href="sil.php?id='.$row2["id"].'"><button class="button button2" name="sepet">'.$row2["fiyat"].'TL</button></a>
                </div>';
                if($i===12){
                    echo '<div class="temizle"></div>';
                    $i = 0;
                }
                $toplam+=$row2["fiyat"];
            }
            if($toplam>0){
                echo '<div class="w3-panel w3-pale-green w3-round-large w3-border">
                <p>Sepetinizde toplam '.$toplam.' TL değerinde ürün bulunmaktadır.</p>
                </div>';
            }else{
                echo '<div class="w3-panel w3-pale-red w3-round-large w3-border">
                <h3>Sepetinizde ürün kalmadı!</h3>
                <p>Diğer ürünlere bakmaya ne dersiniz?</p>
                </div>';
            }
        ?>
    </section>
    <footer>MGuvenc</footer>
</body>
</html>
<?php } ?>