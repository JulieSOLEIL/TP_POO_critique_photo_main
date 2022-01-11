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

    public function renderHTML($view, $param = []) {
        extract($param);
        $connected = $_SESSION['connected'];
        ob_start();
        include $view.'.php';
        // ob_end_flush();
        $pageHtml = ob_get_contents();
        ob_end_clean();
        return $pageHtml;
    }

}