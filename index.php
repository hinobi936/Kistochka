<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Магазин канцтоваров</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="wrap">

    <?php 
    $menu = "main";
    require_once("config/settings.php");
    require_once("components/header.php");
    ?>


      <p>Добро пожаловать в интернет-магазин товаров для дома офиса КИСТОЧКА!</p>
      <img src="img/pencil.jpg" alt="main img" class="img" align="center">
      <p>
        Мы предлагаем Вашей организации приобрести канцтовары и другую продукцию
        для обеспечения своей деятельности, а также Вашим сотрудникам — для
        личного или домашнего потребления. В ассортименте компании более 100 000
        товаров для офиса, школы и дома. Мы предлагаем купить канцелярские товары
        по самым доступным ценам с бесплатной доставкой. Мы регулярно проводим
        выгодные акции с подарками за покупку канцтоваров и другой продукции,
        снижаем цены и устраиваем распродажи. Заказать товары для офиса и дома
        можно через интернет-магазин, по электронной почте или по телефону. Оплата
        принимается в безналичной и наличной форме.
      </p>
      <p>
        Миссия компании — улучшение условий труда в офисах путем оперативного
        обеспечения сотрудников высококачественной канцелярией и другой
        необходимой продукцией, которая делает их работу удобной и комфортной и
        позволяет экономить на расходах!
      </p>
      <p>
        Постоянными клиентами являются более 150 000 организаций малого, среднего
        и крупного бизнеса. Среди наших постоянных клиентов:
      </p>
      <ul>
        <li>Газпром</li>
        <li>Мираторг</li>
        <li>Аэрофлот</li>
        <li>Сбер</li>
        <li>и др.</li>
      </ul>
      <p>
        Собственные складские помещения площадью более 30&nbsp;000 м<sup>2</sup>,
        расположенные на всей территории России позволяют в кратчайшие сроки
        удовлетворить самые взыскательные потребности клиентов.
      </p>
  
      <?php
     require_once('components/footer.php');
     ?>
      
    </div>
  </body>
</html>
