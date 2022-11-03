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
        $sql = mysqli_query($conn, "SELECT * FROM kategori");
        while($row = mysqli_fetch_array($sql)){
            echo '<a href="index.php?id='.$row["id"].'">'.$row["kategori_adi"].'</a>';
        }
        ?>
    </nav>
    <section style="float: left;">
    <form action method="POST">
    <textarea>Mesajınız..</textarea>
    <button class="button button1" style="margin-left: 50px; background-color: #8DC26F; color: white;">GÖNDER</button>
    </form>
    </section>
    <footer>MGuvenc</footer>
</body>
</html>
<?php } ?>