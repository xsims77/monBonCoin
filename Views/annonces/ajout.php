<div class="container text-center">
    <?php
    // var_dump($_POST);
    ?>
    <?php if ($errMsg) : ?>
        <div class="alert alert-dismissible bg-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4 class="alert-heading">Warning!</h4>
            <p><strong><?= $errMsg ?></strong></p>
        </div>
    <?php endif ?>
    <form method="POST" enctype="multipart/form-data">
        <select name="idCategorie" id="categorie" class="form-select">
            <option value="">Sélectionner une catégorie</option>
            <?php foreach ($categories as $categorie) : ?>
                <option value="<?= $categorie['idCategorie'] ?>"><?= ucfirst($categorie['title']) ?></option>
            <?php endforeach ?>
        </select>
        <div class="my-3">
            <label for="title" class="form-label">Nom de l'annonce</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="title">
        </div>
        <div class="my-3">
            <label for="price" class="form-label">Prix</label>
            <div class="input-group">
                <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Prix">
                <span class="input-group-text">€</span>
            </div>
        </div>
        <div class="form-group my-3">
            <label for="description" class="form-label mt-4">Example textarea</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Photo</label>
            <input type="file" name="image" id="image" class="form-control">
            <small class="form-text text-muted">(max 3Mo, format accepté : jpg, jpeg, png)</small>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Ajouter</button>
    </form>
</div>