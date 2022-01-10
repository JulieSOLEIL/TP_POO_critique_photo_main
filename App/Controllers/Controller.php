<?php
namespace App\Controllers;

abstract class Controller {

    public function execute($action) {

        $this->$action();

    }

    public function render($view, $param = []) {
        extract($param);
        $connected = $_SESSION['connected'];
        ob_start();
        include 'App/Views/template.php';
        ob_end_flush();
    }

}