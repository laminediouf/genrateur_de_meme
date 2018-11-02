<?php
include 'connection.php';
session_start();
include 'logout.php';
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
    </style>
    <title>Accueil</title>
</head>
<body>
<div class="container">
    <?php include("menu.php"); ?>
    <div class="row">
        <section class="col-sm-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">FAQ :</h3>
                </div>
                <div class="list-group">
                    <a href="#infos" class="list-group-item" data-toggle="modal">
                        Gestion Import Image
                        <span class="badge">?</span>
                    </a>
                    <div class="modal fade" id="infos" role="dialog" aria-labelledby="modalTitre" area-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h4 id="modalTitre" class="modal-title">Plus d'information</h4>
                                </div>
                                <div class="modal-body">
                                    <blockquote>
                                        <p> La gestion d'import d'image permet a l'tulisateur
                                        de choisir ces propre image et de les modifier pour en creer
                                        une image meme</p>
                                        <hr>
                                        <small class="pull-right">Gestion Import Image </small><br>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#infos1" class="list-group-item" data-toggle="modal">
                        Creation de Meme
                        <span class="badge">?</span>
                    </a>
                    <div class="modal fade" id="infos1" role="dialog" aria-labelledby="modalTitre" area-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h4 id="modalTitre" class="modal-title">Plus d'information</h4>
                                </div>
                                <div class="modal-body">
                                    <blockquote>
                                        <p> Pour creer un meme on choisi une image a partir
                                            de la bibliotheque d'image oubien importer une image et remplir
                                            les champs pour y metre du texte et les options de choix de Couleur de Police
                                            ou de format d'ecriture.</p>
                                        <hr>
                                        <small class="pull-right">Creation de Meme </small><br>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#infos2" class="list-group-item" data-toggle="modal">
                      Realisateurs
                        <span class="badge">?</span>
                    </a>
                    <div class="modal fade" id="infos2" role="dialog" aria-labelledby="modalTitre" area-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h4 id="modalTitre" class="modal-title">Plus d'information</h4>
                                    <img src="../images/img_lamine.JPG" style="width: 200px;height: 200px;">
                                    <img src="../images/img_elzo.JPG" style="width: 200px;height: 200px;">
                                    <img src="../images/img_fatoumata.JPG" style="width: 200px;height: 200px;">
                                    <img src="../images/img_lam.JPG" style="width: 200px;height: 200px;">
                                </div>
                                <div class="modal-body">
                                    <blockquote>
                                        <p> Developpeur web a AccessCode Dakar.</p>
                                        <hr>
                                        <small class="pull-right">Info_Dev </small><br>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#infos3" class="list-group-item" data-toggle="modal">
                       Plus
                        <span class="badge">?</span>
                    </a>
                    <div class="modal fade" id="infos3" role="dialog" aria-labelledby="modalTitre" area-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h4 id="modalTitre" class="modal-title">Plus d'information</h4>
                                </div>
                                <div class="modal-body">
                                    <blockquote>
                                        <p> D'autre Fonctionnaliter sont en cour
                                         de developpement</p>
                                        <hr>
                                        <small class="pull-right">Info_Dev </small><br>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <section class="col-sm-8">
            <div id="carousel" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active"><img alt="Paysage" src="../images/1237.jpg"></div>
                    <div class="item"><img alt="Paysage" src="../images/1238.jpg"></div>
                    <div class="item"><img alt="Paysage" src="../images/couchersoleil.jpg"></div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $(function(){
        $('.carousel').carousel();
        $('blockquote a').tooltip();
    });
</script>
</body>
</html>
