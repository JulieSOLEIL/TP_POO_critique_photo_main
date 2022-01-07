<?php

namespace App\Entities;

class User {

    private ?int $id_user;
    private string $login;
    private string $psw;
    private string $pseudo;

    public function __construct(string $login='', string $psw='', string $pseudo='')
    {
        $this->id_user = null;
        $this->login = $login;
        $this->psw = password_hash($psw, null) ;
        $this->pseudo = $pseudo;
    }

    public function getId_user() {
        return $this->id_user;
    }
    public function getLogin() {
        return $this->login;
    }
    public function getPsw() {
        return $this->psw;
    }
    public function getPseudo() {
        return $this->pseudo;
    }
}