<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Магазин канцтоваров</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body class="list">
<?
          $host = 'localhost';
          $user='root';
          $password='';
          $db_name= 'shop';
 
          $link = mysqli_connect($host, $user, $password, $db_name);
          if ($link==false) {
            echo "не удалось установить подключение к базе данных";
          }
          else {
                $sql = 'SELECT * FROM category';
                $categories = mysqli_query($link, $sql);
                if (!$categories) {
                  echo "ошибка выполнения запроса";
                  }
                  else {
                    // echo " данные получены спешно ";
                  }

          }
?>

    <div class="wrap">

 <?php 
 $menu = "price";
 require_once("config/settings.php");
 require_once("components/header.php");
 ?>

      <h2>Группы товаров</h2>

      <table class="table">
        <tr>
          <th>Категория товаров</th>
        </tr>
        <?
        $cats =[];
        while ($category =mysqli_fetch_assoc($categories)) {
          $cats[]= $category; 
          echo "<tr><td><a href="."#t".$category['id_cat'].">".$category['name']."</a></tr></td>";
        }
        ?>
      </table>

<hr>

<?
foreach ($cats as $category) {
    $sql = "SELECT * FROM tovar WHERE id_cat = " . $category["id_cat"]; 
    $tovars = mysqli_query($link, $sql);

      echo '<table class="group">
      <caption id="t'.$category['id_cat'].'"> '. $category['name'].' </caption>
      <tr><th>Товар</th><th>Производитель</th><th>Артикул</th><th>Цена</th>
      </tr>';
      while ($tovar = mysqli_fetch_assoc($tovars)) {
        echo '<tr><td><a href="tovar.php?id='.$tovar['t_artikul'].'">'.$tovar['t_name']. '</a></td><td>'.
        $tovar['t_proizv'].'</td><td>'.
        $tovar['t_artikul'].'</td><td>'.
        $tovar['t_cost'].'</td></tr>' ;

      };
      echo '</table>';
}
?>




<h2>Оформление заказа</h2>
<form action="order.php" method="POST">
  <label for="tovar">товар</label>
  <select name="tovar" id="tovar">
<?
$sql = 'SELECT * FROM tovar';
$alltovars = mysqli_query($link, $sql);
while ($tovar = mysqli_fetch_assoc($alltovars)){
  echo '<option value="'.$tovar['t_artikul'].'">'.$tovar['t_name'].'</option>';

}
?>
  </select>
  <label for="cnt">количество</label>
  <input type="number" min="0" id="cnt" name="cnt">
<h4>контактные данные</h4>
  <label for="surname">фамилия</label>
  <input type="text" maxlenght="100" id="surname" name="surname">

  <label for="name">имя</label>
  <input type="text" maxlenght="100" id="name" name="name">

  <label for="otch">отчество</label>
  <input type="text" maxlenght="100" id="otch" name="otch">

  <label for="phone">телефон</label>
  <input type="text" maxlenght="11" id="phone" name="phone">

  <label for="email">Email</label>
  <input type="email" maxlenght="100" id="email" name="email">
  
  <input type="submit" name="Оформить заказ">

</form>






      <?php
     require_once('components/footer.php');
     ?>
    </div>
  </body>
</html>
