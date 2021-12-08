<?php

namespace App\Controller;

class ErrorController extends BaseController
{
    public function executeError404()
    {
        $this->render(
            '404.php',
            [],
            'Mauvaise Route'
        );
    }
    public function executeErrorFuntion($params)
    {

        $this->render(
            '404.php',
            [
                'error' => $this->params[0]
            ],
            'Mauvaise Route'
        );
    }
}