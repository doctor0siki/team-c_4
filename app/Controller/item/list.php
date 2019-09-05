<?php

use Model\Dao\Item;
use Slim\Http\Request;
use Slim\Http\Response;

// そのユーザーの投稿一覧を出すコントローラです
$app->get('/item/list/{user_id}', function (Request $request, Response $response, $args) {

    $data=[];

    //アイテムDAOをインスタンス化します。
    $item = new Item($this->db);

    $param["user_id"]=$args["user_id"];
    //アイテム一覧を取得し、戻り値をresultに格納します
    $data["result"] = $item->getItemUser($param["user_id"]);

    // Render index view
    // #$data["result"] = $item->select($param,"","",10,true);
    return $this->view->render($response, 'item/list.twig', $data);

});
