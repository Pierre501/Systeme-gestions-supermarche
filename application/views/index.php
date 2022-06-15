<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mini caisse supermarche</title>
        <link href="<?php echo css_loader("bootstrap.min"); ?>" rel="stylesheet">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="<?php echo css_loader("bootstrap-icons"); ?>" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo css_loader("styles"); ?>" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php if(isset($template)) { ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Mini caisse supermarche</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>Accueil/Changer_Caisse">Change caisse</a></li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    <?php } else{ ?>
        <form class="d-flex">
                        <button class="btn-outline-dark" type="submit">
                            <i class=""></i>
                            <a href="<?php echo base_url(); ?>Accueil/login"  style="text-decoration: none ;">Login Admin</a>
                        </button>
                        <button class="btn-outline-dark" type="submit">
                            <i class=""></i>
                            <a href="<?php echo base_url(); ?>Accueil/"  style="text-decoration: none ;">Saisir numéro caisse</a>
                        </button>
                    </form>
    <?php } ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Bienvenue sur la page d'accueil</h1>
                </div>
            </div>
        </header>
    </br>
        <?php if(isset($template)) { ?>

            <?php include($template); ?>

        <?php } elseif(isset($login)) { ?>

            <?php include($login); ?>

        <?php } elseif(isset($crud)) { ?>

            <?php include($crud); ?>

         <?php } elseif(isset($ajouter)) { ?>

            <?php include($ajouter); ?>

        <?php } elseif(isset($modif)) { ?>

            <?php include($modif); ?>
        <?php } else { ?>
        <div class="container">   
        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1>Choisir caisse</h1>
            <form action="<?php echo base_url(); ?>Accueil/Choix_Caisse" method="post">
              <p>
                <select name="caisse" class="form-control">
                  <option value="null">numéro caisse</option>
                  <?php for($i = 0; $i < count($numCaisse); $i++) { ?>
                    <option value="<?php echo $numCaisse[$i]; ?>"><?php echo $numCaisse[$i]; ?></option>
                  <?php } ?>
                </select>
              </p>
            <p>
              <input type="submit" value="Valider" class="btn btn-primary btn-block">
            </p>
          </form>
          </div>
          <div class="col-md-4"></div>
          </div>
          </div>
        <?php } ?>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="<?php echo js_loader("scripts"); ?>"></script>
        <!-- Core theme JS-->
        <script src="<?php echo js_loader("scripts"); ?>"></script>
    </body>
</html>
