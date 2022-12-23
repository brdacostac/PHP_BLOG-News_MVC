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
    <!-- SWIPER JS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./css/seconnecter.css"/>
</head>

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


<section class="vh-100 Connecter">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="img/connectionImage.png"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

          <form method="post" action="index.php?action=login">
              <input type="hidden" name="type" value="login">
            <!-- Login input -->
            <div class="form-outline mb-4">
              <input type="text" id="form3Example3" name="login" class="form-control form-control-lg"
                placeholder="Entrez votre login" required/>
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
                placeholder="Entrez votre mot de passe" required/>
            </div>

  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Vous n'avez pas de compte ? <a href="index.php?action=creeruncompte"
                  class="link-danger">Créez en un !</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
   
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