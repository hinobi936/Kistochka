<?session_start();
?>
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
        
        
        if (!empty($_POST['username'])){
            $host = 'localhost';
          $user='root';
          $password='';
          $db_name= 'shop';
 
          $link = mysqli_connect($host, $user, $password, $db_name);
          if ($link) {
              $username=$_POST["username"];
              $uspassword=$_POST["password"];
            $sql ="SELECT FROM user WHERE username='".$username."' and password = '".md5($uspassword)."'";
            $user1 = mysqli_query($link,$sql);
            
            if ($user1 and $user1= mysql_fetch_assoc($user1) ) {
                echo "<h4>Пользователь  авторизован</h4>";
                $_SESSION['auth']=true;
            } else {
                echo "<h4>Неверное имя пользователя или пароль</h4>", $username ;
            }
          } else echo "<h4>Ошибка авторизации</h4>";
        }
        ?>

<form action="" method="POST">

  <label for="username">имя пользователя</label>
  <input type="text" maxlenght="100" id="username" name="username">

  <label for="password">пароль</label>
  <input type="password" maxlenght="100" id="password" name="password">
  <span class="warning"></span>

  <input type="submit" vale="Войти на сайт" class="registerButton">

</form>

<script>

</script>
<script src="/js/script.js"></script>

</body>
</html>