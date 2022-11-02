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
</body>
</html>
<?php } ?>