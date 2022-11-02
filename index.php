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
        <li><a href="hakkimizda.php">Hakkımızda</a></li>
        <li><a href="iletisim.php">İletişim</a></li>
        <li><a href="sepet.php">Sepet</a></li>
        <li><a href="profil.php"><?php echo $_SESSION["isim"]; ?></a></li>
    </ul>

    <nav>
        <h3>KATEGORİLER</h3>
        <?php
        $sql = mysqli_query($conn, "SELECT kategori_adi FROM kategori");
        while($row = mysqli_fetch_array($sql)){
            echo '<a href="#">'.$row["kategori_adi"].'</a>';
        }
        ?>
    </nav>

    <section>
        <?php
        $i=0;
        $sql = mysqli_query($conn, "SELECT * FROM urunler");
        while($row = mysqli_fetch_array($sql)){
            $i++;
            echo '<div class="kitap">
            <img src="'.$row["resim_yolu"].'" width="100px">
            <h3>'.$row["ad"].'</h3>
            <h4>'.$row["yazar"].'</h4>
            </div>';
            if($i===14){
                echo '<div class="temizle"></div>';
                $i = 0;
            }
        }
        ?>
    </section>
    <footer>MGuvenc</footer>
</body>
</html>
<?php } ?>