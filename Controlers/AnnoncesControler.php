<?php

namespace Controlers;

use Models\AnnoncesModel;
use Models\CategoriesModel;
use Models\UsersModel;

class AnnoncesControler extends Controler
{
    // Méthode pour afficher les dernières annonces misent en ligne sur la page d'accueil 
    public static function accueil()
    {
        $annonces = AnnoncesModel::findAll("date DESC", "LIMIT 2");

        // On utilise la méthode render
        self::render('annonces/accueil', [
            'title' => 'Bienvenue sur mon bon coin',
            'annonces' => $annonces,
            'sousTitre' => 'Les dernières annonces mises en lignes'
        ]);
    }

    // Méthode pour afficher la détail d'une annonce
    public static function detail(int $id)
    {
        $annonce = AnnoncesModel::findById([$id]);
        $id = $annonce['idUser'];
        $user = UsersModel::findById([$id]);
        $msg = '';
        if (!$annonce) {
            $msg = "Cette annonce n'existe pas";
        }
        // On utilise le render()
        self::render('annonces/detail', [
            'title' => 'Détail de l\'annonce',
            'annonce' => $annonce,
            'msg' => $msg,
            'user' => $user
        ]);
    }

    // Méthode pour afficher toutes les annonces
    public static function annonces($order = null, $categorie = null)
    {
        if ($categorie == null) {
            $annonces = AnnoncesModel::findAll($order);
        } else {
            $annonces = AnnoncesModel::findByCat([$categorie], $order);
        }


        // Récupération des catégories
        $categories = CategoriesModel::findAll();
        self::render('annonces/annonces', [
            'title' => "Les annonces de mon bon coin",
            'annonces' => $annonces,
            'sousTitre' => "Toutes vos annonces de mon bon coin",
            'categories' => $categories
        ]);
    }

    // Méthode pour créer une annonce 
    public static function annonceAjout()
    {
        // Récupérer les catégories
        $categories = CategoriesModel::findAll();

        // Traitement du formulaire
        $errMsg = "";
        if (
            !empty($_POST['title']) &&
            !empty($_POST['idCategorie']) &&
            !empty($_POST['price']) &&
            !empty($_POST['description']) &&
            !empty($_FILES['image'])
        ) {
            // Test sur la photo
            var_dump($_FILES);
            if (($_FILES['image']['size'] < 3000000) &&
                (($_FILES['image']['type'] == 'image/jpeg') ||
                    ($_FILES['image']['type'] == 'image/jpg') ||
                    ($_FILES['image']['type'] == 'image/png') ||
                    ($_FILES['image']['type'] == 'image/webp'))
            ) {

                //  On sécurise
                $secu = self::security();
                // On renomme la photo
                $photoName = uniqid() . $_FILES['image']['name'];
                // On copie l'image sur le serveur
                copy($_FILES['image']['tmp_name'], ROOT . "/public/img/annonces/" . $photoName);
                // On appelle la requête d'enregistrement dans la BDD
                // iUser, idCategorie, title, description, price, image
                $user = $_SESSION['user']['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = (int)$_POST['price'];
                $categorie = (int)$_POST['idCategorie'];
                $photoName;
                $newAnnonce = AnnoncesModel::create([$user, $categorie, $title, $description, $price, $photoName]);
                header('Location: ' . SITEBASE);
            } else {
                $errMsg = "Image trop lourde ou mauvais format";
            }
        } elseif (!empty($_POST)) {
            $errMsg = "Merci de remplir tout les champs";
        }

        self::render('annonces/ajout', [
            'title' => "Nouvelle annonce",
            'categories' => $categories,
            'errMsg' => $errMsg
        ]);
    }

    // Méthode pour modifier une annonce
    public static function annonceModif($id)
    {
        $errMsg = '';
        // On récupère les catégories
        $categories = CategoriesModel::findAll();
        // On récupère la modification de l'annonce
        $annonce = AnnoncesModel::findById([$id]);
        !$annonce ? header('Location: annonces') : null;
        //  Vérifier que l'utilisateur et admin ou que l'utilisateur est le propriétaire de l'annonce
        if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['id'] == $annonce['idUser']) {
            // Traiter de mon formulaire
            if (
                !empty($_POST['title']) &&
                !empty($_POST['idCategorie']) &&
                !empty($_POST['price']) &&
                !empty($_POST['description'])
            ) {
                // Controle sur la photo
                if (
                    !empty($_FILES['image']['name']) && (
                        ($_FILES['image']['size'] < 3000000) &&
                        (($_FILES['image']['type'] == 'image/jpeg') ||
                            ($_FILES['image']['type'] == 'image/jpg') ||
                            ($_FILES['image']['type'] == 'image/png') ||
                            ($_FILES['image']['type'] == 'image/webp')))
                ) {
                    $photoName = uniqid() . $_FILES['image']['name'];
                    copy($_FILES['image']['tmp_name'], ROOT . "/public/img/annonces/" . $photoName);
                } elseif (!empty($_FILES['image']['name'])) {
                    $errMsg = "Image trop lourde ou mauvais format";
                }
                // On sécurise
                self::security();
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = (int)$_POST['price'];
                $categorie = (int)$_POST['idCategorie'];
                $idAnnonce = $annonce['idAnnonce'];
                if (isset($photoName)) {
                    $data = [$categorie, $title, $description, $price, $photoName, $idAnnonce];
                } else {
                    $data = [$categorie, $title, $description, $price, $annonce['image'], $idAnnonce];
                }
                // Executer la requete update
                $annonceModif = AnnoncesModel::update($data);
            } elseif (!empty($_POST)) {
                $errMsg = "Merci de remplir tous les champs (à part la photo)";
            }
        } else {
            header('Location: annonces');
        }


        self::render('annonces/modification', [
            'title' => "Modification de l'annonce",
            'annonce' => $annonce,
            'errMsg' => $errMsg,
            'categories' => $categories
        ]);
    }

    // Méthode de suppression d'annonce
    public static function annonSuppr($id)
    {
        $id = $id;
        // vérifier avant de supprimer complètement l'annonce 
        self::render('annonces/supprimer', [
            'title' => 'vous etes sur ?',
            'id' => $id
        ]);
    }

    // Méthode de confirmation de suppression de l'annonce
    public static function confirmSupp($id){
        // $annuler = '';
        // if (!isset($_GET['$id'])){
        //     $annuler = $_GET('annuler');
        // }else
        AnnoncesModel::delete([$id]);
        $_SESSION['messages'] = 'annonce supprimée';
        header('Location: profil');
    }
     
}
