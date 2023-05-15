<?php

namespace App\Controllers;

use App\Core\Controller;

class Error extends Controller {

    public function __construct($router) {
        parent::__construct($router);
    }

    public function Error($data): void {
        $this->view->addData([
            "title" => "Página não encontrada",
            "errcode" => $data['errcode']
        ]);
        echo $this->view->render('error/error');
    }

}