<?php
namespace App\Models;

use App\Entities\Comment;
use App\Base\Dao;

class CommentModel {

    public function newComment() : Comment {

        $texte = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
        $idUser = filter_input(INPUT_POST, 'idUser', FILTER_SANITIZE_NUMBER_INT);
        $idPhoto = filter_input(INPUT_POST, 'idPhoto', FILTER_SANITIZE_NUMBER_INT);

        $comment = new Comment($texte, $idUser, $idPhoto);

        $dao = new Dao();
        $dao->insertComment($comment);
        
        return $comment;
    }

    public function listComment(int $idPhoto)
    {
        $dao = new Dao();
        $listComment = $dao->selectAllCommentByPhoto($idPhoto);
        return $listComment;
    }
}