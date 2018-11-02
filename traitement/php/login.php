<?php
include_once('connection.php');
$verification=false;
$reponse=$bdd->query('SELECT login, password ,type_group FROM utilisateur') or die(print_r($bdd->errorInfo()));

if(isset($_GET['logout']))
{
    //Message javascript de deconnection
    echo '<script>alert("Vous vous etes deconnecte, merci et la prochaine.")</script>';
}

if((isset($_POST['username']) AND isset($_POST['password'])))
{
    //Hachage du mot de passe en sha1
    $pass_hache=sha1($_POST['password']);
    //$pass_hache2=sha1($_POST['pin']);

    while($donnees=$reponse->fetch())
    {
        if(((strcmp($_POST['username'], $donnees['login'])==0) AND (strcmp($pass_hache, $donnees['password'])==0)))
            // OR ((strcmp($_POST['username'], $donnees['login'])==0) AND (strcmp($pass_hache2, $donnees['pin'])==0)))
        {
            session_start();
            $_SESSION['user']=$_POST['username'];
            $verification=true;
            if($donnees['type_group']==1)
            {
                header('Location:traitement/php/accueil.php');
            }
            /*if($donnees['type_group']==2)
            {
                header('Location:traitement/php/accueil.php');
            }*/
        }
    }
    if($verification==false)
    {
        echo '<script>alert("Mot de passe ou login incorrecte")</script>';
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body{
            /* background: url("media/Gestock-background.png") no-repeat;*/
            background-size: cover;
            height:100%;
        }
        .centered-form{
            margin-top: 150px;
        }
        .centered-form .panel{
            background: rgba(255, 255, 255, 0.8);
            box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Authentification <small> Generator</small></h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="login.php" method="post" onsubmit="return validate(this)">
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                        </div>
                        <input type="submit" value="Connection" class="btn btn-info btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/validate_form_connect.js"></script>
</body>
</html>
