<?php

namespace Controlers;

class PanierControler extends Controler{

    // Méthode ajouter au panier
    public static function ajouter($id, $title, $price, $photo){
                // Si le panier n'existe pas 
                if (!isset($_SESSION['panier'])){
                    $_SESSION['panier'] = [];
                }
                // On crée un tableau $panier
                $panier = $_SESSION['panier'];
                // Oncrée un tableau associatif dans $panier
                $panier[] = ['id' => $id, 'title' => $title, 'price' => $price, 'photo' => $photo];
                $_SESSION['panier'] = $panier;
        
                // On redirige vers les annonces
                $_SESSION['messages'] = "annonce ajouté au panier";
                header('Location: annonces');
    }

    // Méthode supprimer au panier
    public static function supprimer($id){
        unset($_SESSION['panier'][$id]);
        if (count($_SESSION['panier']) == 0){
            unset($_SESSION['panier']);
        }
        header('Location: panier?operation=voir');

    }

    // Méthode voir au panier
    public static function voir(){
        if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])){
            $panier = $_SESSION['panier'];
            self::render('users/panier', [
                'title' => 'Contenu de votre panier',
                'panier' => $panier
            ]);
        }else{
            self::render('users/panier',[
            'title' => "Voir votre panier"
        ]);
    }
    }
}