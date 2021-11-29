<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин канцтоваров</title>
    <link rel="stylesheet" href="css/style.css" /></head>
<body class= "wrap">
<?php 
//  $menu = "price";
 require_once("config/settings.php");
 require_once("components/header.php");
 ?>
<?
if (isset($_GET['id'])){

    $host = 'localhost';
    $user='root';
    $password='';
    $db_name= 'shop';

    $link = mysqli_connect($host, $user, $password, $db_name);
    if ($link==false) {
      echo "не удалось установить подключение к базе данных";
    }
    else {
          $sql = 'SELECT * FROM tovar WHERE t_artikul= '.$_GET['id'];
          $result = mysqli_query($link, $sql);
          if (!$result) {
            echo "ошибка выполнения запроса";
            }
            else {
              $tovar =mysqli_fetch_assoc($result);
              if ($tovar){
                  echo '<p>Наименование: '.$tovar['t_name'].';</p>'.
                  '<p> Артикул: '.$tovar['t_artikul'].';</p>'.
                  '<p> Производитель:'.$tovar['t_proizv'].';</p>'.
                  '<p> Цена: '.$tovar['t_cost'].';</p>'
                  ; 
              }
              else " Нет такого товара!";

            }

    }
}

?>

<?php
     require_once('components/footer.php');
     ?>

</body>
</html>
