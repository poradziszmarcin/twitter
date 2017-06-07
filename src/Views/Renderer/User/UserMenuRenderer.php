<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 06.06.2017
 * Time: 12:04
 */

namespace Twitter\Views\Renderer\User;


use Twitter\Views\Renderer\Interfaces\RenderInterface;

class UserMenuRenderer implements RenderInterface
{

    public function render()
    {
        echo <<<"USERMENU"
<div class="userMenu">
   <br>
   <hr>
   <br>
    <nav>
        <ul>
            <li><a href="index.php?user=info">informacje</a></li>
            <li><a href="index.php?user=editpassword">zmiana hasla</a></li>
         
        </nav>
     <br>
     <br>
</div>
USERMENU;
    }
}