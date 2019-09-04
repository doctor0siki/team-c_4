<?php

use Slim\Http\Request;
use Slim\Http\Response;

// TOPページのコントローラ
$app->get('/test', function (Request $request, Response $response) {

    //dd("オラ悟空。腹減った～");

    $data["message"]="ああああああ";

    //Render index view
    return $this->view->render($response, 'test/index.twig', $data);

});
