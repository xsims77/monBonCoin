<?php

namespace Models;

use PDO;
use App\Db;

class UsersModel extends Db{
    /////////////////////// CRUD /////////////

    // Méthode de lecture /////////
    // Trouver tous les utilisateurs
    public static function findAll(){
        $request = "SELECT * FROM users";
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }


    // Trouver un utilisateur par son id
    /**
     * @param array $id [int]
     * 
     */

    public static function findById($id){
        $request = "SELECT * FROM users WHERE iduser = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    // Trouver un utilisateur par son login
    /**
     * Attend un login d'utilisateur
     */

    // public static function findByLogin(array $login){
    //     $request = "SELECT * FROM users WHERE login = ?";
    //     $response = self::getDb()->prepare($request);
    //     $response->execute($login);

    //     return $response->fetchAll(PDO::FETCH_ASSOC);
    // }
    
    // Trouver un utilisateur par son login ou son id 
    public static function findByIdOrLogin(array $data){
        if(is_int($data[0])){
            $request = "SELECT * FROM users WHERE idUser = ?";
        }else{
            $request = "SELECT * FROM users WHERE login = ?";
        }
        $response = self::getDb()->prepare($request);
        $response->execute($data);

        return $response->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Cette methode permet de trouver un ou des utilisateurs par n'importe quel critère 
     * Elle attend un tableau assossiatif
     * @param array $user["clé"=> ["valeur"]]
     */

    // recherche par key
    // public static function findBy(array $user){
    //     $request = "SELECT * FROM users WHERE " . key($user) ."= ?";
    //     $response = self::getDb()->prepare($request);
    //     $response->execute(current($user));

    //     return $response->fetchAll(PDO::FETCH_ASSOC);
    // }

    /////////////////// Méthode d'écriture ///////////////

    // Créer un nouvel utilisateur
    public static function create(array $data){
        // $data est un tableau qui contient les valeurs à insérer dans la BDD

        $request = "INSERT INTO users (login, password, firstName, lastName, adress, cp , city) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $response = self::getDb()->prepare($request);
        $response->execute($data);
    }
    
    // Modification d'un utilisateur
    public static function update(array $data){
        $request = "UPDATE users SET login = ?, password = ?, firstName = ?, lastName = ?, adress = ?, cp = ?, city = ? WHERE idUser = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($data);
    }

    // Suppression d'un utilisateur
    public static function delete($id){
        $request = "DELETE FROM users WHERE iduser = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($id);
    }

}