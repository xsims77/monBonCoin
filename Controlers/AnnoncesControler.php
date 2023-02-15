<?php
namespace Controlers;

use Models\AnnoncesModel;
use Models\CategoriesModel;

class AnnoncesControler extends Controler{
    // Méthode pour afficher les dernières annonces misent en ligne sur la page d'accueil 
    public static function accueil(){
        $annonces = AnnoncesModel::findAll("date DESC", "LIMIT 2");

        // On utilise la méthode render
        self::render('annonces/accueil', [
            'title' => 'Bienvenue sur mon bon coin',
            'annonces' => $annonces,
            'sousTitre' => 'Les dernières annonces mises en lignes'
        ]);
    }

    // Méthode pour afficher la détail d'une annonce
    public static function detail(int $id){
        $annonce = AnnoncesModel::findById([$id]);
        $msg = '';
        if(!$annonce){
            $msg = "Cette annonce n'existe pas";
            
        }
        // On utilise 
        self::render('annonces/detail', [
            'title'=> 'Détail de l\'annonce',
            'annonce' => $annonce,
            'msg' => $msg
        ]);
    }

    // Méthode pour afficher toutes les annonces
    public static function annonces($order =null, $categorie =null){
        if($categorie == null) {
            $annonces= AnnoncesModel::findAll($order);
        }else{
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
}