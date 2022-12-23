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
    <link rel="stylesheet" href="./css/ajouterNews.css"/>
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

<!--/Header here-->

  <!--Hero banner-->
  <section class="news-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 my-auto mr-auto">
            <div class="wrapper my-auto">
                <h2 class="col-md-8 big-title my-auto">Ajouter News </h2>     
            </div>
            <form method="post" action="index.php?action=creerNews">
                <!-- Title -->
                <div class="form-outline mb-4">
                    <input type="text" name="titleNews" id="form3Example3" class="form-control form-control-lg"
                      placeholder="Entrez Le titre de l'article" />
                </div>

                  <!-- Content -->
                <div class="form-outline mb-3">
                    <textarea name="contentNews" class="form-control form-control-lg" cols="30" rows="10" placeholder="Entrez le contenu de l'article"></textarea>
                </div>

                <!-- Image -->
                <div class="form-outline mb-3">
                    <input type="text" name="imageNews" id="form3Example3" class="form-control form-control-lg"
                           placeholder="Entrez l'adresse de l'image" />
                </div>

                <button class="btn btn-theme " id="confirm">Confirmer</button>
            </form>

      </div>
      
    
  </section>

  
</section>

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