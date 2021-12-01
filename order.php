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
         require_once("config/settings.php");
        require_once "components/header.php" ?>
        <?php
        $newclient=0;
        if (!array_key_exists('tovar', $_POST)|| !array_key_exists('cnt', $_POST) || !array_key_exists('surname', $_POST) || !array_key_exists('name', $_POST) || !array_key_exists('otch', $_POST) || !array_key_exists('email', $_POST)) {
        header ("location: list.php");}
        else {
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $db_name = 'shop';
            $link = mysqli_connect($host, $user, $password, $db_name);
            if ($link){
                $sql = "SELECT * FROM clients where surname ='".$_POST["surname"]."' and name = '".$_POST["name"]."' and patronymic ='".$_POST["otch"]."'";
                $client = mysqli_query($link, $sql);
                if($client) {

                    $client = mysqli_fetch_assoc($client);

                        if ((isset($_POST["phone"]) and $client["phone"] != $_POST["phone"]) or
                         (isset ($_POST["email"]) and $client["email"] != $_POST["email"])) {

                            // $sql = "UPDATE clients SET phone = '".$_POST["phone"]."',
                            //  email = '".$_POST["email"]."' WHERE id_client = ".$client['id_client'];

                             $sql = "UPDATE clients SET phone = '".$_POST["phone"]."', 
                             email = '".$_POST["email"]."' 
                             WHERE id_client = ".$client['id_client']."  ";
                             
                            $client = mysqli_query($link,$sql);
                            var_dump($client);

                            $newclient = $client;


                        }
                     else {
                       $sql = "INSERT INTO clients(surname, name, patronymic, phone, email) VALUES ('".$_POST["surname"]."', '".$_POST["name"]."', '".$_POST["otch"]."', ".$_POST["phone"].", '".$_POST["email"]."')";
                        $res = mysqli_query($link,$sql);
                        $id = mysqli_insert_id($link);
                        $client =["id_client" => $id];
                        $newclient = $client;
                        // print_r($client);
                    }
                } else {
                    echo "Ошибка выполнения запроса";
                }
            } else {
                echo "Соединение не установлено";
            }
        }

        $order = ['ord_date' => date('Y-m-d'), 'ord_status' => 'new', 
        'id_client' => $newclient ['id_client']];

        $sql = "INSERT INTO orders(, ord_date, ord_status, id_client)
         VALUES ('".$order["ord_date"]."', '".$order["ord_status"]."', '".$order["id_client"]."')";
        // var_dump($sql);

        $res = mysqli_query($link,$sql);

        $id = mysqli_insert_id($link);

        if ($res) {
            $sql = "INSERT INTO order_tovar (t_artikul, ord_t_col) 
            VALUES ('".$_POST["tovar"]."', '".$_POST["cnt"]."')";
            $res =mysqli_query($link, $sql);
            if ($res) {
                echo "<H1> Ваш заказ успешно сохранен</H1> <p> Менеджер скоро свяжется
                 с вами для уточнения информации о заказе";
            } else {
                echo "Ошибка добавлния товара в заказ";
            }
        } else{
            echo "Ошибка создания заказа";
        }

?>
        <?php require_once "components/footer.php" ?>
    </div>
</body>
</html>