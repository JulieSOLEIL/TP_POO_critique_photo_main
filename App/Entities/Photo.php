<?php
namespace App\Entities;

use JsonSerializable;

class Photo implements JsonSerializable {

    private ?int $id_photo;
    private string $title_photo;
    private string $name_file;
    private string $post_at;
    private int $id_user;
    private string $pseudo;
    private int $nbr_like;

    public function __construct(string $title='', string $name='', int $id_user=0)
    {
        $this->id_photo = null;
        $this->title_photo = $title;
        $this->name_file = $name;
        $this->post_at = '';
        $this->id_user = $id_user;
        $this->pseudo = '';
        $this->nbr_like = 0;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of id_photo
     */ 
    public function getId_photo()
    {
        return $this->id_photo;
    }

    /**
     * Get the value of title_photo
     */ 
    public function getTitle_photo()
    {
        return $this->title_photo;
    }

    /**
     * Get the value of name_file
     */ 
    public function getName_file()
    {
        return $this->name_file;
    }

    /**
     * Get the value of post_at
     */ 
    public function getPost_at()
    {
        return $this->post_at;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
            return $this->id_user;
    }
    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
            return $this->pseudo;
    }

        /**
     * Get the value of nbr_like
     */ 
    public function getNbr_like()
    {
            return $this->nbr_like;
    }

    public function updateNbrLike( int $valLike) {

        $this->nbr_like += $valLike;

    }
}
