<?php

namespace Models;

use PDO;
use App\Db;

class CategoriesModel extends Db{
    ///////////////////// CRUD //////////////

    // Méthode de lecture //////////////
    // Trouver toutes les catégories 
    public static function findAll(){
        $request = "SELECT * FROM categories";
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    // Trouver une catégorie par son id
    public static function findById($id){
        $request = "SELECT * FROM categories WHERE idcategorie = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
       // Trouver une catégorie par son titre
  

    public static function findByTitle(array $title){
        $request = "SELECT * FROM categories WHERE title = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($title);

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
    
    ///////////////////// Méthode d'écriture  ////////////////////////
    // Créer une catégorie 
    public static function create(array $data){
        $request = "INSERT INTO categories (title) VALUE (?)";
        $response = self::getDb()->prepare($request);
        $response->execute($data);

        return self::getDb()->lastInsertId();
    }

    // Modification de catégories////////////
    public static function update(array $data){
        $request = "UPDATE categories  SET title = ? WHERE idCategorie = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($data);
    }

    // Supprimer une catégorie///////////
    public static function delete(array $id){
        $request = "DELETE FROM categories WHERE idCategorie = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($id);
    }
}