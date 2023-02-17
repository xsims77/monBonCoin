<?php
namespace App;

use Controlers\Controler;
use Controlers\UsersControler;
use Controlers\PanierControler;
use Controlers\AnnoncesControler;

class Routeur{
    public function app(){
        // On teste le routeur
        // echo "le routeur fonctionne";

        // Récupérer l'url
        $request = $_SERVER['REQUEST_URI'];
        // echo $request;
        // On supprime "/monboncoin/public" de $request
        $nb = strlen(SITEBASE);
        $request = substr($request, $nb);
        // echo "<hr>";
        // echo $request;
        // On casse $request pour récupérer uniquement la route demandé et pas les aram GET 
        $request = explode("?", $request);
        $request = $request[0];
        // echo $request;

        // On défini les routes du projet 
        switch ($request){
            case '':
                // echo "vous êtes sur la page d'accueil";
                AnnoncesControler::accueil();
                break;
            case 'annonces':
                // echo "vous êtes sur la page annonces";
                if(isset($_GET['order']) && isset($_GET['idCategorie'])){
                    $order = $_GET['order'];
                    $categorie = $_GET['idCategorie'];
                    AnnoncesControler::annonces($order,$categorie);
                }
                AnnoncesControler::annonces();
                break;
            case 'annonceDetail':
                // echo "vous êtes sur la page détail de l'annonce";
                if(isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    AnnoncesControler::detail($id);
                }
                break;
            case 'annonceAjout':
                // echo "vous êtes sur la page création d'annonce";
                $newAnnonce = AnnoncesControler::annonceAjout();
                break;
            case 'annonceModif':
                // echo "vous êtes sur la page de modification d'annonce";
                if(isset($_SESSION['user'])){
                    $id = $_GET['id'];
                    $updateAnnonce = AnnoncesControler::annonceModif($id);
                }else{
                    header('Location: connexion');
                }
                break;
            case 'annonceSuppr':
                // echo "vous êtes sur la page de suppression d'annonce";
                if(isset($_SESSION['user'])){
                    $id = (int)$_GET['id'];
                    $annonSuppr = AnnoncesControler::annonSuppr($id);
                }else{
                    header('Location: connexion');
                }
                   
                break;
            case 'confirmSupp':
                AnnoncesControler::confirmSupp($_GET['id']);
                break;
            case 'panier':
                // echo "vous êtes sur la page panier";
                // Trois opérations possible: Ajouter/Supprimer/Voir
                
            switch ($_GET['operation']){
                case 'ajouter':
                    if (isset($_GET['id']) &&
                    isset($_GET['title']) &&
                    isset($_GET['price']) &&
                    isset($_GET['photo'])  ) {                   
                    PanierControler::ajouter($_GET['id'],$_GET['title'],$_GET['price'],$_GET['photo']);
                }
                break;
                case 'supprimer':           
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        PanierControler::supprimer($id);
                    }
                    break;
                case 'voir':
                    PanierControler::voir();
                    break;                 
                default:
                header('Location:' . SITEBASE);
                break;
            }
            break;
            case 'inscription':
                // echo "vous êtes sur la page inscription";
                $inscription = UsersControler::inscription();
                break;
            case 'connexion':
                // echo "vous êtes sur la page de connexion";
                $connexion = UsersControler::connexion();
                break;
            case 'deconnexion':
                // echo "vous êtes sur la page de déconnexion";
                unset($_SESSION['user']);
                header('Location: ' . SITEBASE);
                break;
            case 'profil':
                // echo "vous êtes sur la page de profil";
                if (isset($_SESSION['user'])){
                    $profil = UsersControler::profil();
                }else{
                    header('Location: connexion');
                }
                break;
            default:
                echo "Cette page n'existe pas ";
                break;
        }
    }
}