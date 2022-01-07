<?php  
namespace App\Controllers;

use App\Models\CommentModel;

class CommentController extends Controller {

    public function new() {

        $model = new CommentModel();
        $comment = $model->newComment();
        header('Location: index.php?entity=photo&action=show&id='.$comment->getId_photo());
    }
}