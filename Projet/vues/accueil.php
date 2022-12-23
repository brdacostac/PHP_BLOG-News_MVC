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
    <link rel="stylesheet" href="./css/accueil.css"/>
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
                  <li class="nav-item">
                      <div class="wrapsearch">
                          <form method="post" action="index.php?action=rechercherNews" class="search">
                              <input type="text" name="titleNews" class="searchTerm" placeholder="Cherchez un article ... ">
                              <button type="submit" class="searchButton">
                                  <i class="fa fa-search"></i>
                              </button>
                          </form>
                      </div>
                  </li>

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
  <section id="hero-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-5 my-auto mr-auto">
          <h1 class="h1 h1-responsive" >Bienvenue <?php echo $_SESSION['login']?> !</h1>
          <p>Bienvenue sur Keep Info ! Nous publions des articles sur l'actualité. Nous couvrons une large gamme de sujets et sommes ouverts à vos commentaires. Nous espérons que vous apprécierez votre séjour ici. </p>
          <button class="btn btn-theme-2">BUT Informatique</a></button>
          <button class="btn btn-play ml-3 "><i class="fas fa-play"></i></button>
        </div>
        <div class="col-md-5 ml-auto">
          <div class="image">
            <img src="https://www.noiise.com/wp-content/uploads/2022/01/blog-entreprise-prete-plume-creation-contenu-e1643011023806.jpg" alt="">
          </div>
        </div>
      </div>
    </div> 
  </section>
   <!--/Header here-->

  <!--News section-->
  <section class="news-section" id="news-section">

    <div class="container">
     <div class="main-title-box text-center">
             <div class="blogInfos">

                 <?php
                 if (isset($_SESSION['login']))
                 {?>
                     <h2 >Nombre total de commentaires par vous (<?=$_COOKIE['nbCommentairesUser']?>)</h2>
                     <?php
                 } ?>

                 <h2 >Nombre total de commentaires (<?php echo ControleurUser::getNombreAllCommentaires()?>)</h2>
             </div>
             <style>
                 .blogInfos h2{
                     color:#314862 ;
                     font-size: 15px !important;
                     font-weight: 600;
                 }
                 .big-title{
                     padding-top: 60px;
                 }
                 .blogInfos{
                     display: flex;
                     justify-content: space-between;
                 }
                 #hero-banner{
                     text-transform: capitalize;
                 }
             </style>
                     <?php
                     if (empty($news))
                     {?>
                       <h2 class="big-title">Pas d'articles</h2>
                         <?php
                     }
                     else{ ?>
                         <h2 class="big-title">Nos articles récents</h2>
                         <?php
                     }
                     ?>
               </div>
               <div class="row">

                   <?php
                   foreach ($news as $article):
                   ?>

                   <!--Single Blog Start-->

                       <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0ms">
                           <div class="news-item">
                               <div class="news_box">
                                   <div class="newsimg">
                                       <img class="img-responsive"  src=<?=$article->getImage() ?> >
                                   </div>
                                   <div class="news-content">
                                       <div class="news_postdate">
                                           <span><?=$article->getDate()?></span>
                                       </div>
                                       <a class="Title" href="index.php?action=article&newsID=<?=$article->getId()?>" >
                                           <h3><?=$article->getTitle()?></h3>
                                       </a>
                                       <p><?=$article->getContent()?></p>
                                       <div class="news_authorinfo">
                                           <span><i class="fa fa-comment"></i> <a href="index.php?action=article&newsID=<?=$article->getId()?>">Comments: (<?php echo ControleurUser::NbCommentairesParNews($article->getId())?>)</a></span>
                                       </div>
                                       <?php
                                       if (isset($_SESSION['login']) && $_SESSION['role']=="Admin")
                                       {?>
                                               <form method="post" action="index.php?action=deleteNews">
                                                    <button style="background-color: #2289FF;border-radius: 20px 0px 20px 20px;" name="deleteNews" value="<?=$article->getId()?>" class="btn btn-theme-2">Delete</button>
                                               </form>
                                           <?php
                                       } ?>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!--Single Blog End-->
                       <?php endforeach ?>
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