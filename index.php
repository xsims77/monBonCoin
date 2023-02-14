<?php

use Models\AnnoncesModel;
use Models\CategoriesModel;
use Models\UsersModel;

require_once('autoloader.php');

// Tester la méthode findAll()
// $order = "price DESC"; // DESC = trie par ordre décroissant
// $annonces = AnnoncesModel::findAll(null, "limit 1");

//  var_dump($annonces);

// Test de la méthode findById()
// $id = [2];
// $annonces = AnnoncesModel::findById($id);
// var_dump($annonces);

// Test de la méthode finByUser
// $idUser = [2];
// $annoncesUser = AnnoncesModel::findByUser($idUser);
// var_dump($annoncesUser);

// Test de la méthode findByCat
// $idCategorie = [8];
// $annoncesCat = AnnoncesModel::findByCat($idCategorie);
// var_dump($annoncesCat);

// Test de la méthode create
// $data = [1, 9, "tondeuse","maximum 250m², moteur électrique", 185, "tondeuse.jpg"];
// AnnoncesModel::create($data);

// Teste de la méthodde Update()
// $data = [9, "tondeuse à gazon","maximum 250m², moteur électrique", 185, "tondeuse.jpg", 5];
// AnnoncesModel::update($data);

// Teste de la méthode delete($id)

// $id = [5];
// AnnoncesModel::delete($id);

// Test de la méthode findAll( users)
// var_dump(UsersModel::findAll());

// Test de la méthode findById() users
// $id = [1];
// var_dump(UsersModel::findById($id));

// Test de la méthode finddByLogin(array $login)
//  $login = ["admin@admin.fr"];
// var_dump(UsersModel::findByLogin($login));

// Test de la méthode findByIdOrLogin(array $data)
// $data = [2];
// var_dump(UsersModel::findByIdOrLogin($data));

// Test de la méthode findBy() Users
// $user = ['password' => ['1234']];
// // $user = ['idUser' => [1]];
// var_dump(UsersModel::findBy($user));

// Test de la méthode create() users
// $pass = password_hash("1234", PASSWORD_DEFAULT);
// $data = ['test@gmail.com', $pass, 'levi', 'durand', 'rue de Paris', 77127, 'lieusaint'];
// UsersModel::create($data);

// Test de la méthode update() users
// $data = ['sims@gmail.com', $pass, 'sims', 'sims', 'avenue du général de gaulle', 77000, 'melun', 2];
// UsersModel::update($data);

// Test de la méthode delete() users
// $id = [4];
// UsersModel::delete($id);


// Test de la méthode par findAll()
// var_dump(CategoriesModel::findAll());

//  echo "<br>";

// var_dump(CategoriesModel::findById([9]));

// echo "<br>";

// var_dump(CategoriesModel::findByTitle(['maison']));

// Test de la méthode create() categorise

//  CategoriesModel::create(['jouet']);

// Test modif de catégorie
// $data = ["objet", 14];
// CategoriesModel::update($data);

// Test suppression cat

// CategoriesModel::delete([18]);