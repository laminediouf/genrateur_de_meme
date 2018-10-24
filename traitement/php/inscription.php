<?php
include_once('connection.php');
session_start();
//include_once('logout.php');


$reponse=$bdd->query('SELECT * FROM utilisateur')or die(print_r($bdd->errorInfo()));

if(isset($_POST['nom']) OR isset($_POST['prenom']) OR isset($_POST['login']) OR isset($_POST['password'])
    OR isset($_POST['email']) OR isset($_POST['pin']) OR isset($_POST['type_groupe']))
{

    $exist=false;
    while($donnees=$reponse->fetch())
    {
        if(strcmp($_POST['login'], $donnees['login'])==0)
        {
            echo '<script>alert("Ce login existe deja veuillez en choisir un autre")</script>';
            $exist=true;
        }
    }

    if($exist==false)
    {
        $req=$bdd->prepare('INSERT INTO utilisateur (nom, prenom,login,password,email,pin,date_inscription,type_group) VALUES (:nom,:prenom,:login,:password,:email,:pin,CURRENT_DATE (),:type_group)') or die(print_r($bdd->errorInfo()));
        $req->execute(array(
            'nom'=>$_POST['nom'],
            'prenom'=>$_POST['prenom'],
            'login'=>$_POST['login'],
            'password'=>sha1($_POST['password']),
            'email'=>$_POST['email'],
            'pin'=>sha1($_POST['pin']),
            'type_group'=>$_POST['type_group']
        ));
        echo '<script>alert("Inscription Reussi")</script>';
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body
        {
            background-color: #DDD;
            padding-top: 10px;
        }
        [class*="col-"]
        {
            margin-bottom: 20px;
        }
        img
        {
            width: 100%;
        }
        .well
        {
            background-color: #CCC;
            padding: 20px;
        }
        a:active, a:focus
        {
            outline: none;
        }
        [class*="nav navbar-nav"]
        {
            margin-left: 35px;
        }
        [class*="titre"]
        {
            margin-left: 40%;
            margin-right: 37%;
        }
    </style>
    <title>Ajout utilisateur</title>
</head>
<body>
<div class="container">
    <?php include("menu.php"); ?>
    <form class="form-horizontal" action="inscription.php" method="post" onsubmit="return validate(this)">
        <fieldset>
            <h2 class="titre">Veuillez remplir les champ :</h2>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="text" id="login" name="login" placeholder="Login"  class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="text" id="pin" name="pin" placeholder="Pin" class="form-control input-md">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control input-md">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="text" id="nom" name="nom" placeholder="Nom" class="form-control input-md">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="text" id="prenom" name="prenom" placeholder="Prenom" class="form-control input-md">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <select name="type_group" id="type_group" class="form-control input-md">
                            <option> User</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 control-label">
                    <input type="submit" value="Ajouter utilisateur" class="btn btn-info btn-block">
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script src="../js/validate_form_user.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $(function(){
        $('blockquote a').tooltip();
    });
</script>
</body>
</html>
