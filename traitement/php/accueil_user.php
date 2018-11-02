<?php
include 'connection.php';
session_start();
include_once ('logout.php');
if (!empty($_FILES)) {
    $file_name = $_FILES['imageImporter']['name'];
    $file_extension = strrchr($file_name, ".");
    $file_tmp_name = $_FILES['imageImporter']['tmp_name'];
    $file_dest = 'files/'.$file_name;
    $extension_autorisees = array('.png', '.PNG', '.jpg', '.JPG'); //Seul ces formats sont autorisés
    if (in_array($file_extension, $extension_autorisees)) {
        if(move_uploaded_file($file_tmp_name, $file_dest)) {
            $requete = $bdd->prepare('INSERT INTO file(name, file_url) VALUES(?,?)');
            $requete->execute(array($file_name, $file_dest));
            echo "<script> alert ('Fichier envoyer avec succés')</script>";
        }
    }else {
        echo " <script> alert ('seul les fichiers jpg png sont autorisés') </script>";
    }

}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/designe.css">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php include 'menu.php';?>
<section class="col-sm-6">
    <div class="list_image">
    <?php

    $fa=$bdd->query('SELECT * from file');
    while ($faa=$fa->fetch()) {
        ?>
            <ul>
                <li>
                   <a href="#">  <img src="<?= $faa['file_url'] ?>" style="left: 0; top: 0"> </a>
                </li>
            </ul>
        <?php
    }
    ?>
    </div>
</section>
<section class="col-sm-6">

        <div class="col-sm-6">
            <h1>Creer Votre Image Meme</h1>
            <canvas id="memecanvas">
                Sorry, canvas not supported
                <a href="#"> <img id="start-image" src="../images/img2.png" alt="" /> </a>
            </canvas>
            <a href="accueil_user.php" id="img-download" download="GroupLamElzoFatou.png" style="color: white;">
                <button type="button" class="btn btn-info btn-lg" style="width: 300px; height: 40px;">Telecharger l'image</button></a>
        </div>
    <div class="col-sm-6">
        <br><br> <br><br>
    <form class="form-horizontal" method="Post" enctype="multipart/form-data">
            <input type='text' id='top-text' VALUE="hey hey" class="form-control input-md" style="width: 300px; height: 30px;"/>
            <input type='text'  id='bottom-text' value="yah yah" class="form-control input-md" style="width: 300px; height: 30px;"/>

            <label for="couleurTexte">Couleur : </label> <input type="color" id="couleurTexte" name="color" onchange="changeColor()">

            <input type="reset" name="Effacer" class="btn btn-info btn-block" style="width: 300px; height: 30px;"/> <br>

         <!--   <input type="file" name="imageImporter" id="imageImporter" />

            <input type="submit" name="Envoyerlefichier" class="btn btn-info btn-block" style="width: 300px; height: 30px;" /> -->
            <!-- Zoom de l'image
             Scale: <input id="scale" max="4" min="0.1" step="0.01" type="range" value="1" />-->
            <!--  Rotate: <input id="rotate" max="180" min="-180" step="1" type="range" value="0" /> -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalUpload"  style="width: 300px; height: 40px;">Importer une Image</button>
            <div class="modal fade" id="myModalUpload" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Importer un Image</h4>
                        </div>
                        <div class="modal-body">
                            <form action="accueil_user.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" name="imageImporter" id="imageImporter" > <br>
                                    <input type="submit" id="Envoyerlefichier" name="Envoyerlefichier"  class="btn btn-default" value="Importer">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </div>
</section>

<script src="../js/validate_image.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

    <script>
    function changeColor() {
        document.querySelector('#top-text').style.color = document.querySelector('#couleurTexte').value;
        document.querySelector('#bottom-text').style.color = document.querySelector('#couleurTexte').value;
    }

</SCRIPT>
</body>
</html>
