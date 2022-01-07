<?php

namespace App\Controllers;

use App\Models\UserModel;
use Exception;

class UserController extends Controller {

    public function connect() {
        $param = ['error' => '', 'email' => ''];
        $this->render('User/formConnect', $param);
    }

    public function check() {
        $model = new UserModel();
        try {
            $model->verifUser();
            $_SESSION['connected'] = true;
            //$this->render('home');
            header('Location: index.php');
        } catch (Exception $error) {
            $param = ['error' => $error->getMessage(), 'email' => ''];
            $this->render('User/formConnect', $param);
        }
    }

    public function disconnect() {
        $_SESSION = [];
        $_SESSION['connected'] = false;

        session_destroy();
        //$this->render('home');
        header('Location: index.php');
        
    }

    public function create() {
        $param = ['error' => ''];
        $this->render('User/formCreate', $param);
    }

    public function new() {
        $model = new UserModel();
        $model->newUser();
        $this->render('home');
    }

}