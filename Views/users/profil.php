<?php 
// var_dump($annonces);

if (isset($_SESSION['messages'])){
    $message = $_SESSION['messages'];
    unset($_SESSION['messages']);

    echo '<div class="alert alert-dismissible bg-info">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Félicitation !</h4>
        <p><strong>' . $message . ' </strong></p>
    </div>';
}




?>

<h3><?= $_SESSION['user']['id'] == 1 ? "Toutes les annonces du site" : "Vos annonces:" ?></h3>

<table class="table table-hover">
    <thead>
       <tr>
        <th>Titre</th>
        <th>Prix</th>
        <th>Image</th>
        <th>Catégorie</th>
        <th>Détail</th>
        <th>Modifier</th>
        <th>Supprimer</th>
       </tr>
    </thead>
    <tbody>
        <?php foreach ($annonces as $annonce): ?>
            <tr>
                <td><?=$annonce['title'] ?></td>
                <td><?=$annonce['price'] ?></td>
                <td><img src="<?= SITEBASE ?>/img/annonces/<?=$annonce['image'] ?>" alt="<?= $annonce['title'] ?>" class="logo"></td>
                <td><?=$annonce['nameCat'] ?></td>
                <td><a href="annonceDetail?id=<?= $annonce['idAnnonce'] ?>" class="btn btn-primary"><i class="bi bi-binoculars"></i></a> Détail</td>
                <td><a href="annonceDetail?id=<?= $annonce['idAnnonce'] ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a> Modifier</td>
                <td><a href="annonceSuppr?id=<?= $annonce['idAnnonce'] ?>" class="btn btn-primary"><i class="bi bi-trash"></i></a> Supprimer</td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>