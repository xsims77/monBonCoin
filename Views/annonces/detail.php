<?php

// var_dump($annonce);
var_dump($user);

?>

<?php if (!$msg) : ?>
    <div class="card">
        <div class="card-header bg-primary text-center">
            <h3 class="card-title"><?= $annonce['title'] ?></h3>
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="<?= SITEBASE ?>/img/annonces/<?= $annonce['image'] ?>" alt="<?= $annonce['title'] ?>" class="imgAnnonce img-thumbnail grow">
                </div>
                <div class="col-12 col-md-6">
                    <!-- Ne fonctionne que sur chrome -->
                <iframe src="https://www.google.com/maps?q=<?= $user['city'] ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" width='100%' height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="p-2"></iframe>
                </div>
                <p>Description :</p>
                <p><?= $annonce['description'] ?></p>
            </div>
        </div>
    </div>

    <div class="card-footer text-center">
        <p class="price"><?= $annonce['price'] . "€" ?></p>
        <a href="panier?operation=ajouter&id=<?= $annonce['idAnnonce'] ?>&title=<?= $annonce['title'] ?>&price=<?= $annonce['price'] ?>&photo=<?= $annonce['image'] ?>" class="btn btn-primary">Ajouter au panier</a>
    </div>
    </div>
<?php else : ?>
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong><?= $mg ?></strong>
    </div>
<?php endif ?>