<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\Item;

// TOPページのコントローラ
$app->get('/', function (Request $request, Response $response) {
    $item = new Item($this->db);

    $param["user_id"]="";
    // Render index view
    $data["result"] = $item->getItemList();
    dd($data);

    #$data["result"] = $item->select($param,"","",10,true);
    return $this->view->render($response, 'top/index.twig', $data);
    #return $this->view->render($response, 'item/list.twig', $data);

});

// TOPページのコントローラ
$app->get('/sample', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'sample/index.twig', $data);
});
