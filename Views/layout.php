<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Pour rendre le title dynamique -->
  <title><?= $title ?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CDN boostwatch -->
  <link rel="stylesheet" href="https://bootswatch.com/5/quartz/bootstrap.min.css">
  <!-- CDN icon boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../public/css/style.css">

</head>

<body>
  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a href="<?= SITEBASE ?>" class="navbar-brand"><img class="logo" src="<?= SITEBASE ?>/img/logo.jpg" alt="logo"></a>
      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="<?= SITEBASE ?>">Mon Bon Coin
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="annonces">Toutes mes annonces</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="annonceDetail">Détail de mes annonces</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <!-- Titre dynamique -->
    <h1 class="m-5 text-center"><?= $title ?></h1>
    <!-- Ici nous récupérons les données à afficher -->
    <div class="container">
      <?= $content; //Affichage des données
      ?>
    </div>
  </main>
  <footer class='text-center'>sims &copy; 2023</footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>