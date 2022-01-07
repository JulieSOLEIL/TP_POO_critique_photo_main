<?php

namespace App\Models;

use App\Base\Dao;
use App\Entities\User;
use Exception;

class UserModel
{

    public function newUser()
    {
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);

        $user = new User($email, $psw, $pseudo);
        // var_dump($user);
        // echo '<br>';
        // var_dump((array)$user);
        // die();
         $dao = new Dao();
         $dao->insertUser($user);
    }

    public function verifUser() {

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);

        $dao = new Dao();
        $user = $dao->selectUserByLogin($email);

        if (password_verify($psw, $user->getPsw()) ) {
            $_SESSION['idUser'] = $user->getId_user();
            $_SESSION['pseudo'] = $user->getPseudo();
        } else {
            throw new Exception('Mot de passe incorrect');
        }
    }
}
