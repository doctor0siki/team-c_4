<?php
use Slim\Http\Request;
use Slim\Http\Response;
$app->get('/post', function (Request $request, Response $response) {

    $data = [];
    // Render index view
    return $this->view->render($response, 'post/post.twig', $data);
});

$app->post('/upload', function (Request $request, Response $response) {

print $sql;

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

/*$data = $request->getParsedBody();
$item = new Item($this->db);
$id = $item->insert($data);*/
    return $response->withRedirect('/post');
  });
