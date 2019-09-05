<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\Item;

// TOPページのコントローラ
$app->get('/', function (Request $request, Response $response) {
    $item = new Item($this->db);

    $param["user_id"]="";
    // Render index view
    $result = $item->select($param,"","",10,true);
    dd($result);
    return $this->view->render($response, 'top/index.twig', $result);
});

// TOPページのコントローラ
$app->get('/sample', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'sample/index.twig', $data);
});
