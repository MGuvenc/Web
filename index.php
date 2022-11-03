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
        $i=0;
        if(empty($_GET["id"])){
            $_GET["id"]="1";
        }
        $getID = $_GET["id"];
        $sql = mysqli_query($conn, "SELECT * FROM urunler WHERE kategori_id=$getID");
        if ($conn->connect_error) {
            echo "<h3>Bu kategoride ürün bulunamadı!</h3>";
        }else{
            while($row = mysqli_fetch_array($sql)){
                $i++;
                echo '<div class="kitap">
                <img src="'.$row["resim_yolu"].'" width="100px">
                <h5>'.$row["ad"].'</h5>
                <h6>'.$row["yazar"].'</h6>
                <a href="sepet.php?id='.$row["id"].'"><button class="button button1" name="sepet">'.$row["fiyat"].'TL</button></a>
                </div>';
                if($i===12){
                    echo '<div class="temizle"></div>';
                    $i = 0;
                }
            }
        }
        ?>
    </section>
    <footer>MGuvenc</footer>
</body>
</html>
<?php } ?>