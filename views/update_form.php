<?php
session_start();
ini_set('display_errors', "On");
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\PostController;

$postInstance = new PostController();
$postInstance->auth_check('../auth/login.php');
$update_post = $postInstance->getById($_GET['id']);
//var_dump($update_post);
$postInstance->setToken();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>更新画面</title>
</head>

<body>
 <form action="../Execute/update.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
  <input type="hidden" name="id" value="<?php echo $update_post['id'] ?>">
  <input type="text" name="title" value="<?php echo $update_post['title']; ?>">
  <textarea name="detail" id="" cols="30" rows="10"><?php echo $update_post['detail']; ?></textarea>
  <img src="<?php echo '../images/' . $update_post['image'] ?>" alt="">
  <input type="file" name="image" id="" value="<?php echo $update_post['image']; ?>">
  <input type="submit" value="編集する">
 </form>
</body>

</html>