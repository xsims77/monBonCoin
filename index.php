<?php

use Models\AnnoncesModel;

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
AnnoncesModel::update($data);

// Teste de la méthode delete($id)

// $id = [5];
// AnnoncesModel::delete($id);
