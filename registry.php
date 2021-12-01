<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин канцтоваров</title>
    <link rel="stylesheet" href="css/style.css" /></head></head>
<body class="wrap">
<?php 
         require_once("config/settings.php");
        require_once "components/header.php" ;
        
        
        if (!empty($_POST['username']) and !empty($_POST['password'])) {
            $host = 'localhost';
          $user='root';
          $password='';
          $db_name= 'shop';
 
          $link = mysqli_connect($host, $user, $password, $db_name);
          if ($link) {
              $username=$_POST["username"];
              $uspassword=$_POST["password"];
            $sql = 'INSERT INTO user(username, password) VALUES ("'.$username.'", "'.md5($uspassword).'")';
            $res = mysqli_query($link,$sql);
            
            if ($res) {
                echo "<h4> Пользователь успешно зарегистрирован</h4>";
            } else {
                echo "<h4> Ошибка регистрации</h4>", $username ;
            }
          } else echo "<h4> Ошибка соединения с базой данных</h4>";

        }
        
        
        ?>

<form action="" method="POST">

  <label for="username">имя пользователя</label>
  <input type="text" maxlenght="100" id="username" name="username">

  <label for="password">пароль</label>
  <input type="password" maxlenght="100" id="password" name="password">
  <label for="password2">пароль</label>
  <input type="password" maxlenght="100" id="password2" name="password2">
  <span class="warning"></span>

  <input type="submit" name="зарегистрироваться" class="registerButton">

</form>

<script>

</script>
<script src="/js/script.js"></script>

</body>
</html>