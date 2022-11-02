<?php
    ob_start();
    session_start();
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
        <a href="#">Kategori1</a>
        <a href="#">Kategori2</a>
        <a href="#">Kategori3</a>
        <a href="#">Kategori4</a>
    </nav>

    <section>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="kitap">a</div>
        <div class="temizle"></div>
    </section>
    <footer>MGuvenc</footer>
</body>
</html>
<?php } ?>