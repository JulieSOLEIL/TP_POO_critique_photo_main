<?php
namespace App\Entities;

class Comment {

    private ?int $id_comment; // le ? devqnt int veut dire qu'il peut être null
    private string $comment;
    private string $create_at;
    private int $id_user;
    private int $id_photo;
    private string $pseudo;

    public function __construct(string $texte='', int $idUser=0, int $idPhoto=0) {
        
        $this->id_comment = null;
        $this->comment = $texte;
        $this->create_at = date('Y-m-d');
        $this->id_user = $idUser;
        $this->id_photo = $idPhoto;
        $this->pseudo = '';
        
    }

    public function getId_comment() {

        return $this->id_comment;
    }

    public function getComment() {

        return $this->comment;
    }

    public function getCreate_at() {

        return $this->create_at;
    }

    public function getId_user() {

        return $this->id_user;
    }

    public function getId_photo() {

        return $this->id_photo;
    }

    public function getPseudo()
    {
            return $this->pseudo;
    }
}