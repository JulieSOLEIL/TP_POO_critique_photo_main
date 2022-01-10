<?php

namespace App\Base;

use App\Entities\Photo;
use PDO;
use App\Entities\User;
use Exception;

class Dao
{

    private PDO $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new PDO('mysql:host=localhost;dbname=critique_photo;charset=utf8', 'root', '');
    }


    public function insertUser(User $newUser) : void
    {

        $sql = 'INSERT INTO user VALUES (null, :login, :psw, :pseudo)';
        $userStat = $this->dbConnect->prepare($sql);

        $param = [
            ':login' => $newUser->getLogin(),
            ':psw' => $newUser->getPsw(),
            ':pseudo' => $newUser->getPseudo()
        ];
        $userStat->execute($param);
    }

    public function selectUserByLogin($login)
    {
        $sql = 'SELECT * FROM user WHERE login=:login';
        $userStat = $this->dbConnect->prepare($sql);
        $userStat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'App\Entities\User');
        $userStat->bindParam(':login', $login);
        $userStat->execute();
        $user = $userStat->fetch();
        if ($user === false) {
            throw new Exception('Login incorrect');
        }
        return $user;
    }

    public function insertPhoto(Photo $photo) : void
    {

        $sql = 'INSERT INTO photo VALUES (null, :title_photo, :name_file, CURDATE(), :id_user, :nbr_like);';
        $photoStat = $this->dbConnect->prepare($sql);

        $param = [
            ':title_photo' => $photo->getTitle_photo(),
            ':name_file' => $photo->getName_file(),
            ':id_user' => $photo->getId_user(),
            ':nbr_like' => $photo->getNbr_like(),

        ];
        $photoStat->execute($param);
    }

    public function updatePhotoNbrLike($photo) {

        $sql = 'UPDATE photo SET nbr_like=:like WHERE id_photo=:id_photo;';
        $photoStat = $this->dbConnect->prepare($sql);

        $param = [
            'like' => $photo->getNbr_like(),
            'id_photo' => $photo->getId_photo()
        ];
        $photoStat->execute($param);
    }

    public function selectAllPhoto()
    {
        $sql = 'SELECT * FROM photo NATURAL JOIN user';
        $photoStat = $this->dbConnect->prepare($sql);
        $photoStat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'App\Entities\Photo');
        $photoStat->execute();
        $photos = $photoStat->fetchAll();
        return $photos;
    }

    public function selectAllPhotoByIdUser($idUser)
    {
        $sql = 'SELECT * FROM photo WHERE id_user =:id_user';
        $photoStat = $this->dbConnect->prepare($sql);
        $photoStat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'App\Entities\Photo');
        $photoStat->bindParam(':id_user', $idUser);
        $photoStat->execute();
        $photos = $photoStat->fetchAll();
        return $photos;
    }

    public function selectPhoto($id)
    {
        $sql = 'SELECT * FROM photo NATURAL JOIN user WHERE id_photo=:id';
        $photoStat = $this->dbConnect->prepare($sql);
        $photoStat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'App\Entities\Photo');
        $photoStat->bindParam(':id', $id);
        $photoStat->execute();
        $photo = $photoStat->fetch();
        return $photo;
    }

    public function insertComment($comment) {

        $sql = 'INSERT INTO comment VALUES (null, :texte, CURDATE(), :id_user, :id_photo)';
        $commentStat = $this->dbConnect->prepare($sql);

        $param = [
            ':texte' => $comment->getComment(),
            ':id_user' => $comment->getId_user(),
            ':id_photo' => $comment->getId_photo()
        ];
        $commentStat->execute($param);
    }

    public function selectAllCommentByPhoto($idPhoto) {

        $sql = 'SELECT * FROM comment NATURAL JOIN user WHERE id_photo = :id_photo';
        $commentStat = $this->dbConnect->prepare($sql);
        $commentStat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'App\Entities\Comment');
        $commentStat->bindParam(':id_photo', $idPhoto);
        $commentStat->execute();
        $listComments = $commentStat->fetchAll();
        return $listComments;

    }

}
