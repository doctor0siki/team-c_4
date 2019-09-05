<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\Item;

// TOPページのコントローラ
$app->get('/', function (Request $request, Response $response) {
    $item = new Item($this->db);

    // Render index view
    $data["result"] = $item->getItemList();

    return $this->view->render($response, 'top/index.twig', $data);
});

// TOPページのコントローラ
$app->get('/sample', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'sample/index.twig', $data);
});
