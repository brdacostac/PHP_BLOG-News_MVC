<!DOCTYPE html>
<html lang=-"en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
    <title>Keep Info - Bienvenue ! </title>
    <!-- Font Awesome -->
    <link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https:/fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/article.css"/>
</head>
<body>

<!--Header here-->
<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand"><span class="color-primary">Keep</span> <span class="color-secondary">Info</span> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (! isset($_SESSION['login']))
                    {?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?action=connectionUser">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <?php
                    }
                    else{ ?>
                        <a class="nav-link active" href="index.php?action=home">Accueil <span class="sr-only">(current)</span></a>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['login']) && $_SESSION['role']=="Admin")
                    {?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=ajouterNews">Ajouter Article</a>
                        </li>
                        <?php
                    } ?>

                    <?php
                    if (! isset($_SESSION['login']))
                    {?>
                        <li class="nav-item">
                            <a href="index.php?action=connection">
                                <button class="btn btn-theme">Se Connecter</button>
                            </a>
                        </li>
                        <?php
                    }
                    else{ ?>
                        <li class="nav-item">
                            <a href="index.php?action=deconnection">
                                <button class="btn btn-theme">Déconnexion</button>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </div>
</header>

<section class="news-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 my-auto mr-auto">
                <div class="wrapper my-auto">
                    <h2 class="col-md-8 big-title my-auto"><?=$newsbyID->getTitle()?></h2>
                    <div class="news_postdate my-3 ">
                        <span><?=$newsbyID->getDate()?></span>
                    </div>
                </div>
                <div class="image">
                    <img src="<?=$newsbyID->getImage()?>">
                </div>
                <p><?=$newsbyID->getContent()?></p>
            </div>
        </div>
    </div>
    <style>
        .news-content p{
            margin-top: 10%;

        }
        .news-content{
            margin-top: 5%;j
        }
    </style>
    <div class="d-flex align-items-center justify-content-center">
        <div class="container" id="container2">
            <div class="row  mb-4">
                <div class="col-lg-8">
                    <h5>Comments: (<?php echo ControleurUser::NbCommentairesParNews($newsbyID->getId())?>)</h5>
                </div>
            </div>
            <?php
            foreach ($commentaires as $tabCommentaire):
                ?>

                <div class="row mb-4 ">
                    <div class="col-lg-8">
                        <div class="comments">
                            <div class="comment d-flex">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm rounded-circle">
                                        <img class="avatar-img" src="https://zupimages.net/up/22/51/fwlm.png" alt="">
                                    </div>
                                </div>
                                <div class="flex-shrink-1 ms-2 ms-sm-3 wrapper2">
                                    <div class="comment-meta d-flex">
                                        <h6 class="me-2"> <?= $tabCommentaire[0]->getUserlogin()?> </h6>
                                        <span class="text-muted">

                                        </span>
                                    </div>

                                    <?php
                                    foreach ($tabCommentaire as $commentaire):?>
                                    <div class="comment-body">
                                        <div class="commentcontent">
                                            <?= $commentaire->getContent()?>
                                        </div>
                                        <div class="commentdate">
                                            <?= $commentaire->getDate() ?>
                                            <?php
                                            if (isset($_SESSION['login']) && $_SESSION['role']=="Admin")
                                            {?>
                                                <form method="post" class="boutonDelete" action="index.php?action=deleteCommentaire">
                                                    <input hidden="hidden" name="newsID" value="<?=$newsbyID->getId()?>">
                                                    <button name="deleteCommentaire" value="<?=$commentaire->getId()?>" class="Delete btn-primary">x</button>
                                                </form>
                                                <?php
                                            } ?>
                                        </div>
                                    </div>
                                    <?php endforeach ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <style>
                .comment-body{
                    display: flex !important;
                    justify-content: space-between;
                }
                .commentdate{
                    display: flex;
                    justify-content: space-between;

                }
                .commentdate{
                    width: 17%;
                }
                .commentcontent{
                    width: 75%;
                    white-space:normal;
                    word-wrap: break-word;
                }
                .boutonDelete{
                    margin-left: 10px;
                }
            </style>
            <div class="row " id="wrap">
                <div class="col-lg-8">
                    <div class="comment-form d-flex" >
                        <div class="flex-shrink-0">
                            <div class="avatar avatar-sm rounded-circle">
                                <img class="avatar-img" src="https://zupimages.net/up/22/51/fwlm.png">
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-2 ms-sm-3 AddCommentaire">
                            <form method="post" action="index.php?action=ajouterCommentaire">
                                <input hidden="hidden" name="newsID" value="<?=$newsbyID->getId()?>">
                                <input class="form-control py-0 px-1 border-0" name="commentaireContent" rows="1" placeholder="Commencez à écrire ..." style="resize: none;"></input>
                                <button class="btn btn-theme" type="submit">Confimer</button>
                            </form>
                        </div>
                        <style>
                            .AddCommentaire form{
                                display: flex;
                                width: 100% !important;
                            }
                            .AddCommentaire .btn{
                                width: 25%;
                            }
                            .AddCommentaire input{
                                background-color: rgb(231, 231, 231);
                                border-radius: 15px;
                                margin:  0 2% 0 2%;
                                text-indent: 10px;
                            }
                            #container2{
                                padding-top: 3%;
                                padding-bottom: 2%;
                            }
                            #wrap{
                                padding-top: 10%;
                            }

                            .wrapper2{
                                background-color: rgb(240, 240, 240);
                                border-radius: 15px;
                                width: 100%;
                            }
                            .wrapper2 h6{
                                font-weight: bold;

                            }

                            .comment-meta{
                                display: flex;
                                justify-content: space-between;
                                padding: 10px 10px 0 10px;
                            }
                            .comment-body{
                                padding: 20px;
                                font-size: smaller;
                            }

                            .Delete{
                                border-radius: 20%;
                                background-color: rgb(122, 131, 255) !important;
                                border-color: rgb(122, 131, 255) !important;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<!--/Header here-->


<!-- Footer Here -->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h4 class="h3">Keep.Info</h4>
            </div>
            <div class="col-md-3">
                <h4 class="m-0 h6">Développeur</h4>
                <hr color="white">
                <div>
                    <h6>Bruno DA COSTA CUNHA</h6>
                    <br>
                    <h6>Othmane BENJELLOUN</h6>
                </div>
            </div>
            <div class="col-md-2">
                <h4 class="m-0 h6">Contact</h4>
                <hr color="white">
                <ul>
                    <li><a href="" ></a>+330000000</li>
                    <li><a href="" ></a>contact@keepinfo.com</li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Footer Here -->



</body>
</html>
<!--JQuery-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--Bootstrap tooltips-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popperjs/1.14.4/umd/popper.min.is"></script>
<!--Bootstrap core JavaScript-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!--MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<!-- Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>