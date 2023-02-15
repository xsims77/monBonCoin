<?php

namespace Controlers;

use Models\UsersModel;

class UsersControler extends Controler
{
    // Création d'un nouvel utilisateur


    public static function inscription()
    {
        // Traitement du formulaire
        $errMsg ='';
        // Regxex du mot de passe (juste minimum 8 caractères)
        $pattern =  '/^.{8,}$/';
        if (!empty($_POST) &&
            !empty($_POST['login']) &&
            !empty($_POST['firstName']) &&
            !empty($_POST['lastName']) &&
            !empty($_POST['adress']) &&
            !empty($_POST['cp']) &&
            !empty($_POST['city']) &&
            !empty($_POST['password']) &&
            ($_POST['password'] == $_POST['confirm'])
        ) {
            if(!filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)){
                $errMsg = "Merci de saisir un email valide<br>";
            }
            if(!preg_match($pattern, $_POST['password'])){
                $errMsg .= "Merci de saisir un mot de passe correct";
            }
            if(!$errMsg){
                // tout est ok
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // On vérifie que l'email ne soit pas déjà en BDD
                $login = [$_POST['login']];
                $testLogin = UsersModel::findByIdOrLogin($login);
                if($testLogin){
                    $errMsg = "Votre email existe déjà";
                }else{
                    // On enregistre en BDD
                    // On sécurise les données
                    self::security();
                    $data = [$_POST['login'], $pass, 
                        $_POST['firstName'],
                        $_POST['lastName'],
                        $_POST['adress'],
                        $_POST['cp'],
                        $_POST['city']];
                    UsersModel::create($data);
                    $_SESSION['message'] = "Votre compte est créé, vous pouvez vous connecter";
                    header('Location: ' . SITEBASE);
                }
            }

        }elseif (!empty($_POST)){
            $errMsg = "Merci de bien remplir tout les champs du formulaire et de vérifier que vos mot de passe concordent";
        }



        self::render('users/inscription', [
            'title' => "Inscription",
            'errMsg' => $errMsg
        ]);
    }
}
