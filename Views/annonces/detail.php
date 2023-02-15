<?php

// var_dump($annonce);

?>

<?php if (!$msg) : ?>
    <div class="card">
        <div class="card-header bg-primary text-center">
            <h3 class="card-title"><?= $annonce['title'] ?></h3>
        </div>
        <div class="card-body text-center">
            <img src="<?= SITEBASE ?>/img/annonces/<?= $annonce['image'] ?>" alt="<?= $annonce['title'] ?>" class="imgAnnonce img-thumbnail grow">
            <p>Description :</p>
            <p><?= $annonce['description'] ?></p>
        </div>
        <div class="card-footer text-center">
            <p class="price"><?= $annonce['price'] . "€" ?></p>
            <a href="" class="btn primary">Ajouter au panier</a>
        </div>
    </div>
<?php else : ?>
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong><?= $mg ?></strong>
    </div>
<?php endif ?>