<?php
// var_dump($panier);

$total = null;
if(isset($panier) && !empty($panier)){
    foreach ($panier as $key => $annonce) {
        $total += $annonce['price'];
    }
}

?>



<?php if(isset($panier) && !empty($panier)) : ?>
    <div class="container alert alert-info text-center">
        <p>Montant à payer : <strong><?= $total ?></strong> €</p>
    </div>
<table class="table table-hover text-center border-top border-success">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Photo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($panier as $key => $info) : ?>
                <tr class="table">
                    <td><?= $info['title'] ?></td>
                    <td><?= $info['price'] ?> €</td>
                    <td><img src="../public/img/annonces/<?= $info['photo'] ?>" alt="<?= $info['title'] ?>" class="logo"></td>
                    <td><a href="panier?operation=supprimer&id=<?= $key ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>