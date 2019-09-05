<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\Item;

$app->get('/post', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'post/post.twig', $data);
});

$app->post('/upload', function (Request $request, Response $response) {
  $filename = $_FILES['file_upload']['name'];
$extension = array();
$extension = explode('.', $filename);
  $newfilename = date("YmdHis").".".$extension[1];
    $upload = __DIR__.'/../../../public/assets/img/'.$newfilename;
    if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $upload)){
  echo 'アップロード完了';
}else{
  echo 'アップロード失敗';
}

$user = ($this->session->user_info["user_id"]);
//dd("$user");

$data = $request->getParsedBody();
//dd(var_dump($data));
 $item = new Item($this->db);
 $data["image_url"]=$newfilename;
 $data["user_id"]=$user;
 $data["date"]=date("YmdHis");
 $id = $item->insert($data);
    return $response->withRedirect('/post');
  });
