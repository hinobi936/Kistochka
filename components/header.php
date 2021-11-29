<?
require_once("config/menu.php");
?> 
<header class="header">
        <h1><? echo __COMPANYNAME__;?></h1>
        <nav class="menu">
          <ul class="menu__list">

          <?
          foreach ($menuStruct as $key=>$menuitem) {
          ?>

              <li class="<?php if ($menu == $key) 
              { echo "active"; } ?>">
                <a href="<? echo $menuitem['url'] ;?>" 
                class="menu__link"><?
                echo $menuitem['name'];
                ?></a>
              </li>

          <? } ?>

          </ul>
        </nav>
</header>