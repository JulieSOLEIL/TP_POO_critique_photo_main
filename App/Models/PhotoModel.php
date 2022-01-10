<?php
namespace App\Models;

use App\Base\Dao;
use App\Entities\Photo;

class PhotoModel {

    public function newPhoto()
    {
        $photoName = filter_input(INPUT_POST, 'photoName', FILTER_SANITIZE_SPECIAL_CHARS);
        $idUser = $_SESSION['idUser'];
        $fileName = $_FILES['fileName']['name'];
        $fileTmp = $_FILES['fileName']['tmp_name'];

        $photo = new Photo($photoName, $fileName ,$idUser);
        $dao = new Dao();
        $dao->insertPhoto($photo);

        move_uploaded_file($fileTmp, 'Photos/'.$fileName);
    }

    public function listPhoto()
    {
        $dao = new Dao();
        $listPhoto = $dao->selectAllPhoto();
        return $listPhoto;
    }

    public function getPhotoById($id)
    {
        $dao = new Dao();
        $Photo = $dao->selectPhoto($id);
        return $Photo;

    }

    public function getPhotosByIdUser($idUser)
    {
        $dao = new Dao();
        $listPhoto = $dao->selectAllPhotoByIdUser($idUser);
        return $listPhoto;
    }

    public function traitLike() : Photo {

        $idPhoto = filter_input(INPUT_POST, 'id_photo', FILTER_SANITIZE_NUMBER_INT);
        $dao = new Dao();
        $photo = $dao->selectPhoto($idPhoto);

        $valLike = intval(filter_input(INPUT_POST, 'val_like', FILTER_SANITIZE_NUMBER_INT));
        // Maj objet photo
        $photo->updateNbrLike($valLike);
        // Maj base de donnees
        $dao->updatePhotoNbrLike($photo);

        return $photo;
    }
}