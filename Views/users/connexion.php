<?php
//  var_dump($annonces);

if (isset($_SESSION['messages'])) {
    $message = $_SESSION['messages'];
    unset($_SESSION['messages']);

    echo '<div class="alert alert-dismissible bg-info">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Félicitation !</h4>
        <p><strong>' . $message . ' </strong></p>
    </div>';
}

?>
<div class="container text-center">
    <?php if ($errMsg) : ?>
        <div class="alert alert-dismissible bg-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4 class="alert-heading">Warning!</h4>
            <p><strong><?= $errMsg ?></strong></p>
        </div>
    <?php endif ?>
    <form method="POST">
        <div class="row justify-content-around my-2">
            <div class="col-12 col-md-3">
                <label for="login">Email</label>
                <input type="text" name="login" id="login" placeholder="Votre email" class="form-control">
            </div>
            <div class="col-12 col-md-3">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="form-control">
            </div>
        </div>
        <button class="btn btn-secondary w-50">S'inscrire</button>
    </form>
    <div class="text-center">Pas encore de compte ? <a href="inscription">S'inscrire</a></div>
</div>