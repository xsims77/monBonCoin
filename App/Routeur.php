<?php
namespace App;

use Controlers\AnnoncesControler;
use Controlers\Controler;

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
                echo "vous êtes sur la page création d'annonce";
                break;
            case 'annonceModif':
                echo "vous êtes sur la page de modification d'annonce";
                break;
            case 'annonceSuppr':
                echo "vous êtes sur la page de suppression d'annonce";
                break;
            case 'panier':
                echo "vous êtes sur la page panier";
                break;
            case 'inscription':
                echo "vous êtes sur la page inscription";
                break;
            case 'connexion':
                echo "vous êtes sur la page de connexion";
                break;
            case 'deconnexion':
                echo "vous êtes sur la page de déconnexion";
                break;
            case 'profil':
                echo "vous êtes sur la page de profil";
                break;
            default:
                echo "Cette page n'existe pas ";
                break;
        }
    }
}