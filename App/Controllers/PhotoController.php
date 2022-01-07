<?php

namespace App\Controllers;

use Mpdf\Mpdf;
use Dompdf\Dompdf;
use App\Models\PhotoModel;
use App\Models\CommentModel;

class PhotoController extends Controller
{

    public function create()
    {
        $this->render('Photo/formCreate');
    }

    public function new()
    {
        $model = new PhotoModel();
        $model->newPhoto();
        $this->render('Photo/formCreate');
    }

    public function list()
    {
        $model = new PhotoModel();
        $photos = $model->listPhoto();
        $param = ['photos' => $photos];
        $this->render('Photo/list', $param);
    }

    public function show()
    {
        $idPhoto = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $model = new PhotoModel();
        $photo = $model->getPhotoById($idPhoto);

        $model = new CommentModel();
        $comments = $model->listComment($idPhoto);

        $param = [
            'photo' => $photo,
            'comments' => $comments,
        ];
        $this->render('Photo/show', $param);
    }

    public function like()
    {

        // a faire : traitement
        $model = new PhotoModel();
        $photo = $model->traitLike();

        $response = ['nbrLike' => $photo->getNbr_like()];

        //reponse vers le navigateur
        header('Content-type: application/json');
        echo json_encode($response);
    }
    public function createpdf()
    {

        // $mpdf = new Mpdf();
        // $mpdf->writeHTML('<h1>Hello World</h1>');
        // $mpdf->Output();
        
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $html = '<h1>Hello World</h1>';
        $html .= '<h3>'.$_SESSION['pseudo'].'</h3>';

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
