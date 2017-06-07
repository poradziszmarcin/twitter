<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 06.06.2017
 * Time: 11:57
 */

namespace Twitter\Views\Renderer;


use Twitter\Views\Renderer\Interfaces\RenderInterface;

class MenuRenderer implements RenderInterface
{
    public function render()
    {
        echo <<<"MENU"
<div class="menu">
    <nav>
        <ul>
            <li><a href="index.php?user=main">Strona glowna</a></li>
            <li><a >Przycisk 2</a></li>
            <li><a >Przycisk 3</a></li>
            <li><a href="index.php?user=logout">Wyloguj sie</a></li>
        </nav>
</div>
MENU;


    }

}