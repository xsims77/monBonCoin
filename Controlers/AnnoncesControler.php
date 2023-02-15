<?php
namespace Controlers;

use Models\AnnoncesModel;

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
}