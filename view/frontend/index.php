<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Gestion des Malades</title>
    <!-- MDB icon -->
    <link rel="icon" href="public/img/" type="image/x-icon">
    <!-- Font Awesome -->
    <link href="public/fontawesome/css/all.css" rel="stylesheet">
    <script defer src="public/fontawesome/js/all.js"></script>
    <!--load all styles -->
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="public/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="public/css/style.css">
    <?php if (isset($_SESSION['status'])) {
            $message=$_SESSION['status'];
        ?>
        <script type="text/javascript"> alert('<?=$message?>')</script>        
    <?php } ?>
    <?php unset($_SESSION['status']); ?>
</head>
<body>

  <!-- Start your project here-->  
    <header class="main-header"><br>
        <h2 class="title">Gestion des Malades</h2>
    </header>

    <div id="sidebar">
      <header class="logo">Accueil</header>
        <ul>
            <a href="index.php?action=ajouter"><li><i class="fas fa-plus"></i> Ajouter</li></a>
            <a href="index.php?action=recherche"><li><i class="fas fa-search"></i> Rechercher</li></a>
            <a href="index.php?action=modifier"><li><i class="fas fa-edit"></i> Modifier</li></a>
            <a href="index.php?action=supprimer"><li><i class="fas fa-trash-alt"></i> Supprimer</li></a>
        </ul>
    </div>
    <section class="home">
          <div class="container">
                <div class="box-check">
                      <!-- Material form login -->
                      <div class="">
                      
                        <h5 class="card-header info-color white-text text-center py-4">
                          <strong>Identifiant Malade</strong>
                        </h5>
                      
                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0">
                      
                          <!-- Form -->
                          <form class="text-center" style="color: #757575;" action="index.php?action=rechercher" method="post">
                      
                            <!-- Material input -->
                            <div class="md-form">
                              <input type="text" id="inputIconEx2" class="form-control" name="num_fiche">
                              <label for="inputIconEx2">Identifiant</label>
                            </div>
                      
                      
                            <!-- Sign in button -->
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Chercher</button>
                            <?php if (isset($_SESSION['num_fiche'])) {?>
                            <p><?=$_SESSION['malade']['nom'] ?> <?=$_SESSION['malade']['prenom'] ?> <?=$_SESSION['malade']['postnom'] ?>
                              <a href="">Voir La Fiche</a>
                            </p>
                            <p> Fiche N° <?=$_SESSION['malade']['num_fiche'] ?>
                              <a href=""></a>
                            </p>
                            <?php } unset($_SESSION['num_fiche']); 
                                  session_destroy();
                            ?>
                          </form>
                          <!-- Form -->
                      
                        </div>
                      
                      </div>
                      <!-- Material form login -->
                </div>
          </div>
    </section>
  <!-- End your project here-->

  <!-- jQuery -->
    <script type="text/javascript" src="public/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="public/js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

</body>
</html>
