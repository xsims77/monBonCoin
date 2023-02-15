<?php
// var_dump($annonces)




?>


<h2 class="mt-4"><?= $sousTitre?></h2>

<div class="container border border-secondary p-5">
    <div class="row justify-content-around"><?php foreach ($annonces as $key => $annonce) : ?>
            <div class="card border-dark mb-3" style="max-width: 20rem;">
                <div class="card-header"><p><u>Catégorie : <?= $annonce["nameCat"] ?></u></p></div>
                <div class="card-body">
                    <h4 class="card-title"><?= $annonce['title'] ?> : <?= $annonce['price'] . "€"?></h4>
                    <img src="<?=SITEBASE ?>/img/annonces/<?=$annonce['image'] ?>" alt="<?=$annonce['title'] ?>" class="img-fluid">
                    <p class="card-text"><?= $annonce['description'] ?></p>
                </div>
                <div class="card-footer text-center">
                    <a href="annonceDetail?id=<?= $annonce['idAnnonce'] ?>" class="btn btn-secondary">Voir le détail</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>