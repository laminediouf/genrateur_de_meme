<?php
//if (isset($_POST['valider'])){

//}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/designe.css">
    <title>Document</title>
</head>
<body>
<h1>Bien venu USER </h1>
 <canvas id="memecanvas">
     Sorry, canvas not supported
 </canvas>

 <!--<img id="start-image" src="http://weknowmemes.com/wp-content/uploads/2011/10/great-scott-doc-back-to-the-future-drawing.jpg" alt="" />-->

 <a href="#"> <img id="start-image" src="../images/img2.png" alt="" /> </a>
<form action="accueil_user.php" method="post">
    <input type='text' id='top-text' />
    <input type='text'  id='bottom-text' />

    <!--<input type="submit" id="valider" value="Enregistrer la Photo"> -->

    <a href="accueil_user.php" id="img-download" download="GroupLamElzoFatou.png"> Download image</a>

    <input type="file" id="imageImporter" name="imageImporter" />
    <!-- Zoom de l'image -->
     Scale: <input id="scale" max="4" min="0.1" step="0.01" type="range" value="1" />
    <!--  Rotate: <input id="rotate" max="180" min="-180" step="1" type="range" value="0" /> -->
</form>


<script src="../js/validate_image.js"></script>
</body>
</html>
